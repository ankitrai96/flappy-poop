function CustomAlert(){
        this.render = function(dialog){
            var winW = window.innerWidth;
            var winH = window.innerHeight;
            var dialogoverlay = document.getElementById('dialogoverlay');
            var dialogbox = document.getElementById('dialogbox');
            dialogoverlay.style.display = "block";
            dialogoverlay.style.height = winH+"px";
            dialogbox.style.left = (winW/2) - (550 * .5)+"px";
            dialogbox.style.top = "100px";
            dialogbox.style.display = "block";
            document.getElementById('player_score').value = score;
            document.getElementById('dialogboxhead').innerHTML = "Score";
            document.getElementById('dialogboxbody').innerHTML = dialog;
        }
      this.ok = function(){
        document.getElementById('dialogbox').style.display = "none";
        document.getElementById('dialogoverlay').style.display = "none";
      }
    }
    var Alert = new CustomAlert();

function Pipe() {

  var spacing = random(50, height / 3);
  var centery = random(spacing, height - spacing);

  this.top = centery - spacing / 2;
  this.bottom = height - (centery + spacing / 2);
  this.x = width;
  this.w = 48;
  this.speed = 4;

  this.highlight = false;
  this.highlight2 = false;

  this.hits = function(poop) {
    if (poop.y < this.top || poop.y > height - this.bottom) {
      if (poop.x > this.x && poop.x < this.x + this.w) {
        this.highlight = true;
        return true;
      }
    }
    this.highlight = false;
    return false;
  }
  this.cross = function(poop){
    if(poop.x > this.x && poop.x < this.x + this.w && this.highlight2 == false){
      if(poop.y > this.top && poop.y < height - this.bottom){
        this.highlight2 = true;
        return true;
      }
    }
    if(poop.x > this.x + this.w){
      this.highlight2 = false;
    }
    return false;
  }
  this.show = function() {
    fill(0,100,0);
    if (this.highlight) {
      fill(255, 0, 0);
    }
    strokeWeight(2);
    stroke(25);
    rect(this.x, 0, this.w, this.top);
    rect(this.x, height - this.bottom, this.w, this.bottom);
  }

  this.update = function() {
    this.x -= this.speed;
  }

  this.offscreen = function() {
    if (this.x < -this.w) {
      return true;
    } else {
      return false;
    }
  }
}
