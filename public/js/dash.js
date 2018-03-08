$(function(){
    setInterval("rotateImages()",4000);
});

function rotateImages(){
    var curPhoto = $("#advBanner div.photo_current");
    var nxtPhoto = curPhoto.next();
    if (nxtPhoto.length==0) nxtPhoto = $("#advBanner div:first");
    
    curPhoto.removeClass('photo_current').addClass('photo_previous');
    nxtPhoto.css({opacity:0.0}).addClass('photo_current').animate({opacity:1.0}, 1000,
    function(){
        curPhoto.removeClass('photo_previous');
    });
}