$(document).ready(function() {

    $.ajax({
        url: 'api_server/readSubjects.php',
        type: 'GET',
        dataType: "json",
        data: {},
        success: function(data) {
            var htmlSubjectlements = fillSubjects(data.subjectList);
            $("#createPostSubject").html(htmlSubjectlements);
            $("#modificaPostSubject").html(htmlSubjectlements);
        }
    });
  
  });

  function fillSubjects(subjectList) {
    var selectOptions = '<option value="" disabled selected>Scegli la materia</option>';

    $.each(subjectList, function (key, subject) {
        selectOptions += `<option value="` + subject.id + `">` + subject.materia + `</option>`;
    });
                  
    return selectOptions;                
  }