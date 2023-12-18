let returnValue = 0;

function setFields(id) {
    $.ajax({
        url: "../Pages/getSettingsList.php",
        type: "post",
        data: {"id": id},
        success: function (response) {
            const obj = JSON.parse(response);

            console.log(obj);

            $("#makeQuestionsField").empty();

            for (let i = 0; i < obj.length; i++) {
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