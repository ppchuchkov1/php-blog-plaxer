//gsap
  gsap.from('#index-nav', { 
    duration: 2.5, 
    ease: "expo.out", 
    x: "-100%" 
  });

  gsap.from('#contact-nav', { 
    duration: 1.5,
    ease: "bounce.out",
    y: "-100%",
  });
  
  gsap.from('#contact-section', { 
    duration: 1.5,
    ease: "bounce.out",
    y: "100%",
  });

  gsap.from('.header-h1', { 
    duration: 2.5, 
    ease: "expo.out", 
    x: "400%" 
  });
 
  gsap.from(".comp-img-1", {
    scrollTrigger: ".comp-img-1",
    duration: 2.5,
    ease: "back.out(1.7)",
    x: "400%" 
  });
 
  gsap.from(".comp-img-2", {
    scrollTrigger: ".comp-img-2",
    duration: 2.5,
    ease: "back.out(1.7)",
    x: "400%" 
  });
 
  gsap.from(".comp-img-3", {
    scrollTrigger: ".comp-img-3",
    duration: 2.5,
    ease: "back.out(1.7)",
    x: "400%" 
  });
 
  gsap.from("#blog-1", {
    scrollTrigger: "#blog-1",
    duration: 1.5,
    ease: "bounce.out",
    y: "100%",
  });
 
  gsap.from("#blog-2", {
    scrollTrigger: "#blog-2",
    duration: 1.5,
    ease: "bounce.out",
    y: "100%",
  });
 
  gsap.from("#blog-3", {
    scrollTrigger: "#blog-3",
    duration: 1.5,
    ease: "bounce.out",
    y: "100%",
  });

  