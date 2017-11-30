var data = {
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
};

$(window).on('load', function () {
    $("#test_name").val(data.name);
});