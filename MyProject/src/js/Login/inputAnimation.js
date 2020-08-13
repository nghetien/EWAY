$(document).ready(function(){
    $("#email").focusin(()=>{
        $("#email").addClass("borderInput paddingTextInputIn");
        $("#email").removeClass("paddingTextInputOut");
        $("#labelEmail").addClass("text-primary paddingLabelIn");
        $("#labelEmail").removeClass("paddingLabelOut");
    });
    $("#email").focusout(()=>{
        $("#email").removeClass("borderInput paddingTextInputIn");
        $("#email").addClass("paddingTextInputOut");
        $("#labelEmail").removeClass("paddingLabelIn text-primary");
        $("#labelEmail").addClass("paddingLabelOut");
    });
    $("#password").focusin(()=>{
        $("#password").addClass("borderInput paddingTextInputIn");
        $("#password").removeClass("paddingTextInputOut");
        $("#labelPwd").addClass("text-primary paddingLabelIn");
        $("#labelPwd").removeClass("paddingLabelOut");
    });
    $("#password").focusout(()=>{
        $("#password").removeClass("borderInput paddingTextInputIn");
        $("#password").addClass("paddingTextInputOut");
        $("#labelPwd").removeClass("paddingLabelIn text-primary");
        $("#labelPwd").addClass("paddingLabelOut");
    });
});