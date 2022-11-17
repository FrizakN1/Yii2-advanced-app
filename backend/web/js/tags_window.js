let tagList = document.querySelector('.tags_list');
function tagListBuild(value, searchTag){
    if (value){
        for (let item of searchTag){
            let element = document.createElement('div');
            let span = document.createElement('span');
            let div = document.createElement('div')
            span.textContent = item.name;
            element.id = item.id;
            element.className = "tag";
            element.setAttribute('onclick', 'addTag(event)')
            element.append(span, div);
            tagList.append(element);
        }
    } else {
        for (let item of tags){
            let element = document.createElement('div');
            let span = document.createElement('span');
            let div = document.createElement('div')
            span.textContent = item.name;
            element.id = item.id;
            element.className = "tag";
            element.setAttribute('onclick', 'addTag(event)')
            element.append(span, div);
            tagList.append(element);
        }
    }
}


$('.tags_close').on('click', function (){
    $('.tags_window_main').css('display', 'none');
})

$('.btn_tags').on('click', function (){
    $('.tags_window_main').css('display', 'flex');
    tagListBuild();
})

$('#search').on('input', function (event){
    let tagList = document.querySelector('.tags_list');
    let searchTag = new Array();
    for (let item of tags){
        let tempName = item.name.toLowerCase();
        if (tempName.includes(event.currentTarget.value.toLowerCase())){
            searchTag.push(item);
        }
    }
    tagList.innerHTML = '';
    tagListBuild(event.currentTarget.value, searchTag)
})

$('.tag').on('click', function (event){
    addTag(event);
})
function addTag(event){
    let div = document.createElement('div');
    div.textContent = event.currentTarget.childNodes[0].textContent;
    div.setAttribute("data-id", event.currentTarget.id);
    div.setAttribute('onclick', 'deleteTag(this)');
    $('.choose_tags').append(div);
    let newsList = document.querySelector('#news-tagslist');
    newsList.value = newsList.value + event.currentTarget.id +', ';
}

function deleteTag(target){
    let newsList = document.querySelector('#news-tagslist');
    console.log(newsList);

    newsList.value = newsList.value.replace(target.dataset.id+', ', '');
    target.remove()
}