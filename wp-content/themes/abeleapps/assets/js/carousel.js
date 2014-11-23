$('#myCarousel').carousel({
    interval: 2000
});

// Could be slid or slide (slide happens before animation, slid happens after)
$('#myCarousel').bind('slid', function() {
    alert("Slide Event")
})