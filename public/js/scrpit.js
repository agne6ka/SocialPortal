var $edit = document.getElementsByClassName('btn-edit'),
    $postId = document.getElementById('post-id'),
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
