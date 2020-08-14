$(document).ready(()=>{
    $("#firstname").focusin(()=>{
        $("#firstname").removeClass("paddingTextInputOut");
        $("#labelFname").addClass("text-primary");
        $("#firstname").addClass("paddingTextInputIn borderInput");
    });
    $("#firstname").focusout(()=>{
        $("#firstname").removeClass("paddingTextInputIn borderInput");
        $("#labelFname").removeClass("text-primary");
        $("#firstname").addClass("paddingTextInputOut");
    });

    $("#lastname").focusin(()=>{
        $("#lastname").removeClass("paddingTextInputOut");
        $("#labelLname").addClass("text-primary");
        $("#lastname").addClass("paddingTextInputIn borderInput");
    });
    $("#lastname").focusout(()=>{
        $("#lastname").removeClass("paddingTextInputIn borderInput");
        $("#labelLname").removeClass("text-primary");
        $("#lastname").addClass("paddingTextInputOut");
    });

    $("#username").focusin(()=>{
        $("#username").removeClass("paddingTextInputOut");
        $("#labelUserName").addClass("text-primary");
        $("#username").addClass("paddingTextInputIn borderInput");
    });
    $("#username").focusout(()=>{
        $("#username").removeClass("paddingTextInputIn borderInput");
        $("#labelUserName").removeClass("text-primary");
        $("#username").addClass("paddingTextInputOut");
    });

    $("#email").focusin(()=>{
        $("#email").removeClass("paddingTextInputOut");
        $("#labelEmail").addClass("text-primary");
        $("#email").addClass("paddingTextInputIn borderInput");
    });
    $("#email").focusout(()=>{
        $("#email").removeClass("paddingTextInputIn borderInput");
        $("#labelEmail").removeClass("text-primary");
        $("#email").addClass("paddingTextInputOut");
    });

    $("#password").focusin(()=>{
        $("#password").removeClass("paddingTextInputOut");
        $("#labelPwd").addClass("text-primary");
        $("#password").addClass("paddingTextInputIn borderInput");
    });
    $("#password").focusout(()=>{
        $("#password").removeClass("paddingTextInputIn borderInput");
        $("#labelPwd").removeClass("text-primary");
        $("#password").addClass("paddingTextInputOut");
    });
});