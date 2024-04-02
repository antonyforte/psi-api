var spread_tl = new TimelineMax()
  .to(".circle",0, {left:"50%", top: "50%"})
  .to("#circle1", 0.3, {left:"0", top: "0", ease:Expo.easeInOut})
  .to("#circle2", 0.3, {x: "50%", left: "auto", right: "0%", top: "0", ease:Expo.easeInOut})
  .to("#circle3", 0.3, {x: "50%", left: "auto", right: "0%", top: "auto", y: "50%", bottom: "0", ease:Expo.easeInOut})
  .to("#circle4", 0.3, {left: "0%", top: "auto", y: "50%", bottom: "0", ease:Expo.easeInOut})
  // .to("#container", 0.3, {rotation: 360, ease:Power4.easeInOut}, "-=0.1")
  // .to(".circle p", 0.3, {rotation: -360, ease:Power4.easeInOut}, "-=0.3")
  .reverse();

var grow_tl = new TimelineMax()
  .to("#circle5", 0.1, {scale: 1.05, ease:Power1.easeInOut})
  .to("#circle5", 0.2, {scale: 0.85, ease:Elastic.easeInOut})
  .to("#circle5", 0.1, {scale: 0.9, ease:Power1.easeInOut})
  .to("#circle5", 0.2, {scale: 0.7, ease:Power4.easeInOut})
  .to("#circle5", 0.2, {scale: 0.5, ease:Power4.easeInOut})
  .to("#circle5", 0.1, {scale: 0.6, ease:Power1.easeInOut})
  .to("#circle5", 0.2, {scale: 0.35, ease:Power4.easeInOut})
  .reverse();

$(".menu, #circle5").click(function() {
  $(".menu").toggleClass("menu-animated");
  $("#bg").toggleClass("bg-animated");
  // $("#container").toggleClass("container-animated");
  $(".circle").toggleClass("circle-animated");
  $(".circle p").toggle();
  spread_tl.reversed(!spread_tl.reversed());
  grow_tl.reversed(!grow_tl.reversed());
});

// $(".menu").hover(function() {
//   $("#circle2").css({"left":"initial","right":"0","top":"0"})
// },
//     function() {
//       $("#circle2").css({"left":"50%","right":"initial","top":"50%"});
//   });