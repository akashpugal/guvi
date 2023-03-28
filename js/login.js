$(document).ready(function() {
    $("signup").click(function(event) {
      var formData = {
        name: $("#name").val(),
        email: $("#email").val(),
        mobile: $("mob").val(),
        dob: $("dob").val(),
        location: $("loc").val(),
        nationality: $("nationality").val(),
        password: $("pas").val()
      };

      $.ajax({

          url: "./php/login.php",
          method:"POST",
          data: formData,
          dataType: "json",
           encode: true,
      }).done(function(data) {
        console.log(data);
      })

      event.preventDefault();
    });
  });
