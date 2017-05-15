var $edit = document.getElementsByClassName('btn-edit'),
    $delete = document.getElementsByClassName('btn-delete'),
    $postId = document.getElementById('post-id'),
    $removeId = document.getElementById('remove-id'),
    $deletePost = document.querySelector('.post-delete'),
    $btnNo = $deletePost.querySelector('#cancel'),
    $tittle = document.getElementById('tittle'),
    $text = document.getElementById('text');


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

$btnNo.addEventListener('click', function (e) {
    e.preventDefault();

    console.log('clicked');
    $removeId.value = '';
    $deletePost.classList.add('hidden');
});