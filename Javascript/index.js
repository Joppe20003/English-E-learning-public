let questionNr = 0;
let goodQuestionNr = 1;
let questions = [];
let answers = [];
let formData = [];
let lengthQuestions;
let index = 0;
let expQuestion = 0;
let totalExpQuestion = 0;
let data;
let good = 0;
let wrong = 0;
let returnValueIndex;

function loadQuestions(id) {
    let url = "../Pages/getQuestions.php?listId=" + id;

    fetch(url,
        {
            method: "GET",
            headers: { "Content-type" :"application/json" },
        })
        .then((response) => response.json())
        .then((json) =>  {
            data = json;

            lengthQuestions = json.length;
            expQuestion = 100 / lengthQuestions;

            setQuestion(data);
        })
        .catch((error) => {
            //niks
            }
        );
}

function setQuestion() {
    $("#questionBlockPlay").empty();

    $("#questionBlockPlay").append("<label for=\"name\" class=\"form-label h5 mb-3\">" + data[index]['question'] + "</label>\n" +
        "                        <input type=\"text\" class=\"form-control\" id=\"answer\" aria-describedby=\"nameHelp\" name=\"answer\">");
}

function checkQuestionOut() {
    if (index === lengthQuestions) {
        document.getElementById('displayOne').style.display = "none";
        document.getElementById('displayTwo').style.display = "block";

        totalExpQuestion += expQuestion;

        document.querySelector(".progress-bar").style.width = totalExpQuestion + "%";

        document.getElementById('good').innerHTML = good;
        document.getElementById('wrong').innerHTML = wrong;

        document.getElementById('goodBox').value = good;
        document.getElementById('wrongBox').value = wrong;
    } else {
        nextQuestion();
    }
}

function checkAnswer(yourAnswer) {
    if (data[index]['good_answer'] === yourAnswer) {
        alert('Antwoord goed');

        good++;
    } else {
        alert('Antwoord niet goed, goede antwoord was: ' + data[index]['good_answer'])

        wrong++;
    }

    index++;

    checkQuestionOut();
}

function nextQuestion() {
    totalExpQuestion += expQuestion;

    document.querySelector(".progress-bar").style.width =  +totalExpQuestion + "%";

    setQuestion();
}

function setDocumentBegin() {
    $(document).ready(function () {
        $("#makeQuestions").click(function () {
            $("#makeQuestionsField").append("<div class=\"col-lg-12 mt-3 mb-3 border rounded hover-background-gray\" id=\"QuestionBlock" + questionNr + "\">\n" +
                "    <i class=\"fa fa-close deleteQuestionBlockButton\" id='" + questionNr + "' onclick='deleteQuestionBlock(this.id)' style=\"\n" +
                "                                    position: relative;\n" +
                "                                    float: right;\n" +
                "                                    right: -17px;\n" +
                "                                    top: -7px;\n" +
                "                                    background: red;\n" +
                "                                    padding: 5px;\n" +
                "                                    color: white;\n" +
                "                                    border-radius: 50%;\n" +
                "                                \"></i>\n" +
                "    <div class=\"m-lg-2\">\n" +
                "        <div class=\"mt-3 mb-3\">\n" +
                "            <label for=\"name\" class=\"form-label\">Vraag  " + goodQuestionNr + ":</label>\n" +
                "            <input type=\"text\" class=\"form-control\" id=\"Question" + questionNr + "\" aria-describedby=\"nameHelp\" name=\"name\"\" required>\n" +
                "                                    </div>\n" +
                "                                    <div class=\" mb-3\">\n" +
                "                                        <label for=\" email\" class=\" form-label\">Antwoord  " + goodQuestionNr + ":</label>\n" +
                "                                        <input type=\" text\" class=\" form-control\" id=\"Answer" + questionNr + "\" aria-describedby=\" emailHelp\" name=\" email\" required>\n" +
                "                                    </div>\n" +
                "                                    </div>\n" +
                "                                </div>");
            questionNr++;
            goodQuestionNr++;
        });
    });

    $(document).ready(function () {
        for (let i = 0; i < 5; i++) {
            $("#makeQuestionsField").append("<div class=\"col-lg-12 mt-3 mb-3 border rounded hover-background-gray\" id=\"QuestionBlock" + questionNr + "\">\n" +
                "    <i class=\"fa fa-close deleteQuestionBlockButton\" id='" + i + "' onclick='deleteQuestionBlock(this.id)' style=\"\n" +
                "                                    position: relative;\n" +
                "                                    float: right;\n" +
                "                                    right: -17px;\n" +
                "                                    top: -7px;\n" +
                "                                    background: red;\n" +
                "                                    padding: 5px;\n" +
                "                                    color: white;\n" +
                "                                    border-radius: 50%;\n" +
                "                                \"></i>\n" +
                "    <div class=\"m-lg-2\">\n" +
                "        <div class=\"mt-3 mb-3\">\n" +
                "            <label for=\"name\" class=\"form-label\">Vraag  " + goodQuestionNr + ":</label>\n" +
                "            <input type=\"text\" class=\"form-control\" id=\"Question" + questionNr + "\" aria-describedby=\"nameHelp\" name=\"name\"\" required>\n" +
                "                                    </div>\n" +
                "                                    <div class=\" mb-3\">\n" +
                "                                        <label for=\" email\" class=\" form-label\">Antwoord  " + goodQuestionNr + ":</label>\n" +
                "                                        <input type=\" text\" class=\" form-control\" id=\"Answer" + questionNr + "\" aria-describedby=\" emailHelp\" name=\" email\" required>\n" +
                "                                    </div>\n" +
                "                                    </div>\n" +
                "                                </div>");
            questionNr++;
            goodQuestionNr++;
        }
    });
}

function setDocument() {
    $(document).ready(function () {
        $("#makeQuestionsField").empty();

        for (let i = 0; i < questionNr; i++) {
            let j = i + 1;
            $("#makeQuestionsField").append("<div class=\"col-lg-12 mt-3 mb-3 border rounded hover-background-gray\" id=\"QuestionBlock" + i + "\">\n" +
                "    <i class=\"fa fa-close deleteQuestionBlockButton\" id='" + i + "' onclick='deleteQuestionBlock(this.id)' style=\"\n" +
                "                                    position: relative;\n" +
                "                                    float: right;\n" +
                "                                    right: -17px;\n" +
                "                                    top: -7px;\n" +
                "                                    background: red;\n" +
                "                                    padding: 5px;\n" +
                "                                    color: white;\n" +
                "                                    border-radius: 50%;\n" +
                "                                \"></i>\n" +
                "    <div class=\"m-lg-2\">\n" +
                "        <div class=\"mt-3 mb-3\">\n" +
                "            <label for=\"name\" class=\"form-label\">Vraag  " + j + ":</label>\n" +
                "            <input type=\"text\" class=\"form-control\" id=\"Question" + i + "\" aria-describedby=\"nameHelp\" name=\"name\"\" required>\n" +
                "                                    </div>\n" +
                "                                    <div class=\" mb-3\">\n" +
                "                                        <label for=\" email\" class=\" form-label\">Antwoord  " + j + ":</label>\n" +
                "                                        <input type=\" text\" class=\" form-control\" id=\"Answer" + i + "\" aria-describedby=\" emailHelp\" name=\" email\" required>\n" +
                "                                    </div>\n" +
                "                                    </div>\n" +
                "                                </div>");
        }
    });
}

function registerQuestion() {

    if (questionNr == 0) {
        setMessageAlertBoxLogin('alertDangerList','alertDangerListText',"vul tenminste 1 vraag in");
        returnValueIndex = 1;
    } else {
        for (let i = 0; questionNr > i; i++) {
            if ($("#Question" + i)[0].value == "") {
                setMessageAlertBoxLogin('alertDangerList','alertDangerListText',"niet alles ingevuld");
                returnValueIndex = 1;
                break
            } else if ($("#Answer" + i)[0].value == "") {
                setMessageAlertBoxLogin('alertDangerList','alertDangerListText',"niet alles ingevuld");
                returnValueIndex = 1;
                break
            } else {
                questions.push([$("#Question" + i)[0].value, $("#Answer" + i)[0].value]);
            }
        }
    }

    if (returnValueIndex !== 1) {
        if ($("#nameList")[0].value == "") {
            return setMessageAlertBoxLogin('alertDangerList','alertDangerListText',"niet alles ingevuld");
        } else if ($("#descriptionList")[0].value == "") {
            return setMessageAlertBoxLogin('alertDangerList','alertDangerListText',"niet alles ingevuld");
        } else if ($("#modeId")[0].value == "") {
            return setMessageAlertBoxLogin('alertDangerList','alertDangerListText',"niet alles ingevuld");
        } else {
            formData.push($("#nameList")[0].value);
            formData.push($("#descriptionList")[0].value);
            formData.push($("#modeId")[0].value);

            $.ajax({
                url: "../Pages/sendQuestions.php",
                type: "post",
                data: {"data": questions, "formData": formData},
                success: function (response) {

                    window.location.href = "../Pages/lists.php";
                    goToPage('lists.php')
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //niks

                    window.location.href = "../Pages/lists.php";
                    return setMessageAlertBoxLogin('alertDangerList','alertDangerListText',"Lijst maken niet gelukt probeer opnieuw");
                }
            });
        }
    }
}

function deleteQuestionBlock(id) {
    let goodId = "QuestionBlock" + id

    questionNr--;
    goodQuestionNr--;

    $("#" + goodId).remove();
    setDocument();
}

function setMessageAlertBoxLogin(elementId, textId, message) {
    document.getElementById(elementId).style.display = "block";
    document.getElementById(textId).innerHTML = message;

    setTimeout(setElementHide, 5000, elementId);
}

function setElementHide(elementId) {
    document.getElementById(elementId).style.display = "none";
}

function goToPage(page) {
    window.location.href = page;
}