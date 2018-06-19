function iFrameOn() {
  richTextField.document.designMode ='On';
}

function iBold() {
  richTextField.document.execCommand('bold',false,null);
}

function iUnderline() {
  richTextField.document.execCommand('underline',false,null);
}

function iItalic() {
  richTextField.document.execCommand('italic',false,null);
}

function submit_form() {
var theForm = document.getElementById("myForm");
theForm.elements["bericht"].value =window.frames['richTextField'].document.body.innerHTML;
theForm.submit();
}
