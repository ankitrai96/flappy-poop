var poop;
var img;
var pipes = [];
var score = 0;
function preload(){
  img = loadImage('resource/poop.png');
  mySound = loadSound('resource/fart.mp3');
}
function setup() {
  if(displayWidth > 1000 || displayHeight > 1000){
    createCanvas(400,windowHeight);
  }
  else{
  createCanvas(windowWidth,windowHeight);
  }
  mySound.setVolume(0.8);
  poop = new Poop();
  pipes.push(new Pipe());
}

function draw() {
  background(0,191,255);
  for (var i = pipes.length - 1; i >= 0; i--) {
    pipes[i].show();
    pipes[i].update();
    fill(255);
    textSize(50);
    text(score, 25, 50);
    if (pipes[i].hits(poop)) {
      mySound.playMode('restart');
      mySound.play();
      noCanvas();
      if(score<2){
        Alert.render(score + " Poop. Try harder!");
      }
        else if(score>1){
          Alert.render(score + " Poops. Well Played!");
        }
    }
    if(pipes[i].cross(poop)) {
      score+=1;
    }
    if (pipes[i].offscreen()) {
      pipes.splice(i, 1);
    }


  }
  poop.update();
  poop.show();

  if (frameCount % 60 == 0) {
    pipes.push(new Pipe());
  }
}

function keyPressed() {
  if (key) {
    poop.up();
  }
 }
 function mousePressed() {
   if (mouseButton) {
     poop.up();
   }
  }
  function touchStarted(){
    poop.up();
      if(dialogbox.style.display == "block"){
        Alert.ok();
        document.getElementById("regScore").submit(); 
      }
    return false;
  }
  function windowResized() {
    if(displayWidth >1000 || displayHeight > 1000){
    resizeCanvas(windowWidth, windowHeight);
  }
 }
