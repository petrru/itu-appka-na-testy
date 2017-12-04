/*var data = {
    name: 'Pes',
    questions: [
        {
            text: "Velikost registru AX je",
            type: "auto",
            shuffle_options: null,
            options: [
                {text: "4 bity", correct: false},
                {text: "8 bitů", correct: false},
                {text: "16 bitů", correct: true},
                {text: "32 bitů", correct: false},
            ]
        }, {
            text: "Vysvětlete, co je to IOPL",
            type: "auto",
            shuffle_options: null,
            options: []
        }, {
            text: "PC je",
            type: "auto",
            shuffle_options: null,
            options: [
                {text: "segment", correct: false},
                {text: "offset", correct: true},
                {text: "registr", correct: true},
                {text: "selektor", correct: false},
                {text: "programový čítač", correct: true},
                {text: "deskriptor", correct: false},
            ]
        }
    ]
};*/

$(window).on('load', function () {
    $("#test_name").val(data.name).keyup(function () {
        data.name = $(this).val();
    });

    for (var i = 0; i < data.questions.length; i++) {
        add_question(i);
    }
    /**
     * Změna textu otázky
     */
    $("body").on("keyup", ".q_text", function() {
        var q_no = $(this).parents(".question").data("q-no");
        data.questions[q_no].text = $(this).val();
    })
    /**
     * Změna textu odpovědi
     */
    .on("keyup", ".answer", function() {
        var q_no = $(this).parents(".question").data("q-no");
        var question = data.questions[q_no];
        var $answer = $(this).parents("li");
        if ($answer.data("a-id") === undefined) {
            if (!$(this).val())
                return;
            $answer.data("a-id", question.options.length);
            question.options[question.options.length] = {
                text: $(this).val(),
                correct: $answer.find(".correct").prop("checked")
            };
            //console.log(question.options.length);
            /*console.log(data.questions[q_no].options.length);
            $(this).data("a-id", data.questions[q_no].options.length)*/
            add_empty_answer(q_no);
            guess_question_format(q_no);
        }
        else {
            question.options[$answer.data("a-id")].text = $(this).val();
        }
        //console.log($(this).val());
    })
    /**
     * Stiknutí ctrl + *  -->  odzaškrtnutí odpovědi
     */
    .on("keypress", ".answer", function (e) {
        if (e.which === 42 && e.originalEvent.ctrlKey) {
            var $checkbox = $(this).parents('li').find('.correct');
            $checkbox.prop('checked', !$checkbox.prop('checked')).change();
        }
    })
    /**
     * Stiknutí ctrl + +  -->  nová otázka
     */
    .keypress(function (e) {
        if (e.which === 43 && e.originalEvent.ctrlKey) {
            e.preventDefault();
            $("#add-q").click();
        }
    })
    /**
     * Změna zaškrtnutí správnosti odpovědi
     */
    .on("change", ".correct", function() {
        var q_no = $(this).parents(".question").data("q-no");
        var question = data.questions[q_no];
        var $answer = $(this).parents("li");
        var answer = question.options[$answer.data("a-id")];
        if ($answer.find('.correct').prop('type') === 'radio') {
            question.options.forEach(function (option) {
                option.correct = false;
            });
        }
        if (answer === undefined)
            return;
        answer.correct = $(this).prop("checked");
        guess_question_format(q_no);
    })
    /**
     * Smazání odpovědi
     */
    .on("click", ".remove-answer", function() {
        var q_no = $(this).parents(".question").data("q-no");
        var question = data.questions[q_no];
        var $answer = $(this).parents("li");
        var $answers = $answer.parent().find("li");
        var a_id = $answer.data("a-id");
        var answer = question.options[a_id];
        $answer.remove();
        question.options.splice(a_id, 1);
        for (var i = a_id + 1; i <= question.options.length; i++) {
            $answers.eq(i).data("a-id", i - 1);
        }
        guess_question_format(q_no);
    })
    /**
     * Změna typu otázky
     */
    .on("click", ".select_answer_format", function() {
        var q_no = $(this).parents(".question").data("q-no");
        data.questions[q_no].type = $(this).val();
        change_question_type(q_no);
    })
    /**
     * Extra možnosti
     */
    .on("change", ".q_options", function() {
        switch ($(this).val()) {
            case "delete-q":
                if (!confirm("Opravdu chcete smazat tuto otázku?")) {
                    $(this).val('');
                    break;
                }
                var $question = $(this).parents(".question");
                var q_no = $question.data("q-no");
                $question.remove();
                data.questions.splice(q_no, 1);
                for (var new_i = q_no; new_i < data.questions.length; new_i++) {
                    var old_i = new_i + 1;
                    $(".question_" + old_i)
                        .removeClass("question_" + old_i)
                        .addClass("question_" + new_i)
                        .data("q-no", new_i)
                        .find(".question_number span").html(new_i + 1);
                }
                break;
        }

    });

    /**
     * Uložení změn
     */
    $(".save-all").submit(function (e) {
        e.preventDefault();
        var json = JSON.stringify(data);
        $.post("save_test.php", {data: json, id: ID}, function (b) {
            if (b === 'ok-new') {
                window.location.replace("main.php?new-success");
            }
            else if (b === 'ok-edit') {
                $(".saved").show().delay(1000).fadeOut();
            }
            else {
                console.log(b);
            }
        });
    });

    /**
     * Nová otázka
     */
    $("#add-q").click(function () {
        var no = data.questions.length;
        data.questions.push({
            text: "",
            type: "auto",
            shuffle_options: null,
            options: []
        });
        add_question(no);
    });

    /**
     * Smazat test
     */
    $("#del-t").click(function () {
        location.href = "delete_test.php?id=" + ID;
    });

    /**
     * Vytisknout test
     */
    $("#print-t").click(function () {
        location.href = "print_test.php?id=" + ID;
    });
});

function change_question_type(question_id) {
    var $question = $(".question_" + question_id);
    var question = data.questions[question_id];
    switch (question.type) {
        case "auto":
        case "multiple":
            $question.removeClass("full-text");
            $question.find(".correct").prop("type", "checkbox")
                .prop("name", "");
            break;
        case "single":
            $question.removeClass("full-text");
            $question.find(".correct").prop("type", "radio")
                 .prop("name", "qc-" + question_id);
            $question.find(".correct:checked").change();
            break;
        case "full_text":
            $question.addClass("full-text");
            break;
    }
}

function guess_question_format(question_id) {
    var $question = $(".question_" + question_id);
    var correct_cnt = 0;
    var question = data.questions[question_id];
    question.options.forEach(function (answer) {
        if (answer.correct)
            correct_cnt++;
    });
    var out = "";
    if (correct_cnt === 0 && question.options.length <= 1)
        out = "full text";
    else if (correct_cnt === 1)
        out = "jedna správná";
    else
        out = "více správných";
    $question.find(".auto-type").html("Auto (" + out + ")");
}

function add_question(question_id) {
    var question = data.questions[question_id];
    var prev = question_id - 1;
    var no = question_id + 1;
    var $q = $(".sample_question").clone().removeClass("sample_question")
        .addClass("question_" + question_id).data("q-no", question_id)
        .insertAfter(".question_" + prev);
    $q.find(".question_number span").html(no);
    $q.find(".q_text").val(question.text);
    $q.find(".select_answer_format").val(question.type);

    for (var i = 0; i < question.options.length; i++) {
        add_answer(question_id, i);
    }
    add_empty_answer(question_id);
    guess_question_format(question_id);
    change_question_type(question_id);
}

function add_answer(question_id, answer_id) {
    var answer = data.questions[question_id].options[answer_id];
    var $question = $(".question_" + question_id);
    var $sample = $question.find(".sample_answer");
    var $answer = $sample.clone()
        .removeClass("sample_answer").data("a-id", answer_id)
        .insertBefore($sample);
    $answer.find(".answer").val(answer.text);
    if (answer.correct) {
        $answer.find(".correct").prop("checked", true);
    }
}

function add_empty_answer(question_id) {
    var $question = $(".question_" + question_id);
    var $sample = $question.find(".sample_answer");
    $sample.clone().removeClass("sample_answer").insertBefore($sample);
}
