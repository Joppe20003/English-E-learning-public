let returnValueEdit = 0;
let questionsEdit = [];
let lengthQuestionsEdit = 0;

function loadQuestionsEditLength(id) {
    $.ajax({
        url: "../Pages/getQuestions.php",
        type: "post",
        data: {"id": id},
        success: function (response) {
            data = JSON.parse(response);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });

    console.log(lengthQuestionsEdit + 1);
}

function registerUpdate() {
    returnValueEdit  = 0;

    for (let i = 0; i < lengthQuestionsEdit; i++) {
        if ($("#Question" + i)[0].value == "") {
            setMessageAlertBoxLogin('alertDangerList','alertDangerListText',"niet alles ingevuld");

            break;
        } else if ($("#Answer" + i)[0].value == "") {
            setMessageAlertBoxLogin('alertDangerList','alertDangerListText',"niet alles ingevuld");

            break;
        } else {
            questionsEdit.push([$("#Question" + i)[0].value, $("#Answer" + i)[0].value, $("#questionId" + i)[0].value]);
        }
    }

    if (returnValueEdit !== 1) {
        if ($("#nameList")[0].value == "") {
            return setMessageAlertBoxLogin('alertDangerList', 'alertDangerListText', "niet alles ingevuld");
        } else if ($("#descriptionList")[0].value == "") {
            return setMessageAlertBoxLogin('alertDangerList', 'alertDangerListText', "niet alles ingevuld");
        } else if ($("#modeId")[0].value == "") {
            return setMessageAlertBoxLogin('alertDangerList', 'alertDangerListText', "niet alles ingevuld");
        } else {
            formData.push($("#nameList")[0].value);
            formData.push($("#descriptionList")[0].value);
            formData.push($("#modeId")[0].value);
            formData.push($("#listId")[0].value);

            $.ajax({
                url: "../Pages/editListsQuestions.php",
                type: "post",
                data: {"data": questionsEdit, "formData": formData},
                success: function (response) {
                    window.location.href = "../Pages/lists.php";
                    setMessageAlertBoxLogin('alertDangerList','alertDangerListText',"Lijst succes vol bewerkt");
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    setMessageAlertBoxLogin('alertDangerList','alertDangerListText',"Lijst bewerken niet gelukt probeer opnieuw");
                }
            });
        }
    }
}

function setFieldsEdit(id) {
    $.ajax({
        url: "../Pages/getSettingsList.php",
        type: "post",
        data: {"id": id},
        success: function (response) {
            const obj = JSON.parse(response);

            console.log(obj);

            lengthQuestionsEdit = obj.length;

            $("#makeQuestionsField").empty();

            for (let i = 0; i < obj.length; i++) {
                let j = i + 1;
                $("#makeQuestionsField").append("<div class=\"col-lg-12 mt-3 mb-3 border rounded hover-background-gray\" id=\"QuestionBlock" + i + "\">\n" +
                    "    <div class=\"m-lg-2\">\n" +
                    "        <div class=\"mt-3 mb-3\">\n" +
                    "            <label for=\"name\" class=\"form-label\">Vraag  " + j + ":</label>\n" +
                    "            <input type=\"text\" class=\"form-control\" id=\"Question" + i + "\" aria-describedby=\"nameHelp\" name=\"name\"\" value='" + obj[i]['question'] + "' required>\n" +
                    "                                   <input type='hidden' name='questionId' id='questionId" + i + "' value='" + obj[i]['id'] + "'>\n" +
                    "                                    </div>\n" +
                    "                                    <div class=\" mb-3\">\n" +
                    "                                        <label for=\" email\" class=\" form-label\">Antwoord  " + j + ":</label>\n" +
                    "                                        <input type=\" text\" class=\" form-control\" id=\"Answer" + i + "\" aria-describedby=\" emailHelp\" name=\" email\" value='" + obj[i]['good_answer'] + "' required>\n" +
                    "                                    </div>" +
                    "                                    </div>\n" +
                    "                                </div>");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}