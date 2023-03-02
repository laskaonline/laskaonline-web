// Start Open Camera
$(document).ready(function() {
    // Get video and canvas elements
    var video = document.getElementById('video');
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');
    
    // Get user media
    navigator.mediaDevices.getUserMedia({ video: true })
      .then(function(stream) {
        video.srcObject = stream;
        video.play();
      })
      .catch(function(err) {
        console.log("An error occurred: " + err);
      });
    
    // Take snapshot
    $('#snap').click(function() {
      context.drawImage(video, 0, 0, canvas.width, canvas.height);
    });
  });  
// End Open Camera