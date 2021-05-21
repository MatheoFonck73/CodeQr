function Load() {
  var Form = new FormData($("#FilesForm")[0]);
  $.ajax({
    url: "Funtions/import_controller.php",
    type: "post",
    data: Form,
    processData: false,
    contentType: false,
    success: function () {
      Swal.fire({
        icon: "success",
        title: "Upload",
        text: "The file was loaded successfully.",
      });
    },
    error: function (e) {
      Swal.fire({
        icon: "error",
        title: "Upload",
        text: e,
      });
    },
  });
  return false;
}

function Table() {
  $.ajax({
    type: "POST",
    url: "Funtions/show_controller.php",
    success: function (r) {
      $("#table").html(r);
    },
    error: function (e) {
      $("#table").html(e);
    },
  });
  return false;
}

function Donwload() {
  $.ajax({
    type: "POST",
    url: "Funtions/export_controller.php",
    success: function () {
      Swal.fire({
        icon: "success",
        title: "Download",
        text: "The file was downloaded successfully.",
      });    
    },
    error: function (e) {
      Swal.fire({
        icon: "error",
        title: "Can not be downloaded.",
        text: e,
      });
    },
  });
  return false;
}

//creator: Mateo Fonseca
