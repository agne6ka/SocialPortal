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

for(var $i in $friendItems){
    if ($friendItems[$i].hasAttribute){

        $friendItems[$i].addEventListener('click', function () {
            console.log('clicked');
            $showMessage.click();
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
