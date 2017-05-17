var $edit = document.getElementsByClassName('btn-edit'),
    $delete = document.getElementsByClassName('btn-delete'),
    $postId = document.getElementById('post-id'),
    $removeId = document.getElementById('remove-id'),
    $deletePost = document.querySelector('.post-delete'),
    $tittle = document.getElementById('tittle'),
    $text = document.getElementById('text'),
    $showMessage = document.getElementById('show-msg'),
    $friendItems = document.querySelectorAll('.friend-info_item');


for(var $i in $edit){
    if ($edit[$i].hasAttribute){
        $edit[$i].addEventListener('click', function () {
            var parent = this.parentElement,
                dataId = parent.dataset.id,
                dataTittle = parent.querySelector('.posts_item__tittle').innerText,
                dataText = parent.querySelector('.posts_item__text').innerText;

            $postId.value = dataId;
            $tittle.value = dataTittle;
            $text.value = dataText;
        });
    }
}

for(var $i in $delete){
    if ($delete[$i].hasAttribute){
        $delete[$i].addEventListener('click', function () {
            var parent = this.parentElement,
                dataId = parent.dataset.id;

            $removeId.value = dataId;
            $deletePost.classList.remove('hidden');
        });
    }
}

if ($deletePost){
    var $btnNo = $deletePost.querySelector('#cancel');

    $btnNo.addEventListener('click', function (e) {
        e.preventDefault();

        console.log('clicked');
        $removeId.value = '';
        $deletePost.classList.add('hidden');
    });
}


for(var $i in $friendItems){
    if ($friendItems[$i].hasAttribute){
        $friendItems[$i].addEventListener('click', function () {
            $showMessage.click();
        });
    }
}

/** Form handling **/

var $form = $('#form');
var $showInfoContainer = $('.show-msg');
var $msgInfo = $('.show-msg_info');

$form.submit(function (event) {
    event.preventDefault();

    $.ajax({
        type: 'POST',
        url: $form.attr('action'),
        data: $form.serialize(),
        dataType: 'json',
        success: function (data) {
            if (data.status) {
                console.log(data);
            } else {
                var $msgItem = $('.message_item');

                if ($msgItem.length){
                    $msgItem.remove();
                } else if (data.no_message){
                    $msgInfo.text(data.no_message);
                } else {
                    $msgInfo.text(' ');
                    for(var $i in data){
                        $showInfoContainer.append(
                            '<div class="message_item">'+
                            '<p class="message_item__text">Message: '+data[$i].message +'</p>'+
                            '<p class="message_item__date">Date: '+data[$i].date +'</p>'+
                            '<p class="message_item__user">From: '+data[$i].user_from +'</p>'+
                            '<p class="message_item__user">To: '+data[$i].user_to +'</p>'+
                            '</div>'
                        )
                    }
                }
            }
        }
    });
});