class Login {

    static init(){
      if (window.localStorage.getItem("token")){
        window.location="index.html";
      }else{
        $('body').show();
      }
      var urlParams = new URLSearchParams(window.location.search);
      if (urlParams.has('token')){
        $("#change-password-token").val(urlParams.get('token'));
        Login.show_change_password_form();
      }
    }
  
    
    static register(){
      $("#register-link").prop('disabled',true);
      RestClient.post("api/register", AUtils.form2json("#register-form"), function(data){
        $("#register-form-container").addClass("hidden");
        $("#form-alert").removeClass("hidden")
        $("#form-alert .alert").html(data.message);
      }, function(jqXHR, textStatus, errorThrown){
        $("#register-link").prop('disabled',false);
        toastr.error(jqXHR.responseJSON.message);
      });
    }
  
    static login(){
      $("#login-link").prop('disabled',true);
      RestClient.post("api/login", AUtils.form2json("#login-form"), function( data ) {
        window.localStorage.setItem("token", data.token);
        window.location = "index.html";
      }, function(jqXHR, textStatus, errorThrown){
        $("#login-link").prop('disabled',false);
        toastr.error(error.responseJSON.message);
      });
    }

  }
  