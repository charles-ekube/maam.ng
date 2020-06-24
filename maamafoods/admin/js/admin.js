
$(document).ready(function(){
    $('.sidenav').sidenav();

    $('.dropdown-trigger').dropdown({
        coverTrigger: false,
        constrainWidth:false,
        hover: true
    });


});


function toggleSidebar() {
    document.querySelector('#sidebar').classList.toggle('active');
}

