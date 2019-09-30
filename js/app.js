setUser();

function setUser() {
    Swal.fire({
        type: 'info',
        input: 'text',
        title:'Digite um Nick',
        inputPlaceholder: "Digite um nick"
    }).then((result) => {
        $.post('handlers/user.php?action=setUser&user='+result.value,function () {
            Swal.fire({
                type:'success',
                title: 'Seu nick é '+ result.value
            })
        })
    });
}

setInterval(function () {
    LoadChat()
}, 1000)

function LoadChat(){
    $.post('handlers/messages.php?action=getMessages',function (response) {

        let scrollps = $('#chat').scrollTop();
        let scrollpos = parseInt(scrollps) + 520;
        let scrollHeight = $('#chat').prop('scrollHeight');

        $('#chat').html(response);

        if(scrollps < scrollHeight){

        }else{
            $('#chat').scrollTop($('#chat').prop('scrollHeight'))
        }

    })
}

$('.textarea').keyup(function (e) {
    // verifico que se a tecla pressionada foi Enter
    if ( e.which == 13 ) {
        $('form').submit()

    }
});

$('form').submit(function () {

    let message = $('.textarea').val();

    $.post('handlers/messages.php?action=sendMessage&message='+message, function (response) {

        if( response == 1){
            LoadChat();
            document.querySelector('#messageFrm').reset();
        }
    })

    return false;
});