$(document).ready(function() {
  $('#control').hide();
  $('#video').resize(function(){
    $('#cont').height($('#video').height());
      $('#cont').width($('#video').width());
      $('#control').height($('#video').height()*0.1);
      $('#control').css('top',$('#video').height()*0.9 );
        $('#control').width($('#video').width());
        $('#control').show();
});
function opencam(){
  navigator.getUserMedia= navigator.getUserMedia ||   navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.oGetUserMedia || navigator.msGetUserMedia ;
  if(navigator.getUserMedia)
  {
    navigator.getUserMedia({video:true },  streamWebCam ,throwError) ;
  }
}

function closecam(){
  video.pause();
  try {
    video.srcObject = null;
  } catch (error) {
    video.src =null;
  }
  var track = strr.getTracks()[0];  // if only one media track
  // ...
  track.stop();
}
  var video= document.getElementById('video');
  var canvas= document.getElementById('canvas');
  var context= canvas.getContext('2d');
  var strr;
  function streamWebCam(stream){
  const  mediaSource = new MediaSource(stream);
  try {
      video.srcObject = stream;
    } catch (error) {
      video.src = URL.createObjectURL(mediaSource);
    }
    video.play();
    strr=stream;
  }
  function throwError(e){
    alert(e.name);
  }
$('#open').click(function(event) {
  opencam();
   $('#control').show();
});
$('#show').click(function(event) {
  opencam();
   $('#control').show();
});
$('#close').click(function(event) {
  closecam();
});
$('#exit').click(function(event) {
  closecam();
});
  $('#snap').click(function(event) {
    context.drawImage(video, 0, 0, canvas.width, canvas.height);
  });
$('#retake').click(function(event) {
$('#vid').css('z-index','30');
$('#capture').css('z-index','20');
});
});