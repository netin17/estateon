$(document).ready(function() {
    
    let data = [
        {
            link: 'https://tympanus.net/Tutorials/CSS3Lightbox/images/thumbs/1.jpg',
            url: 'https://tympanus.net/Tutorials/CSS3Lightbox/images/full/1.jpg',
            title: 'Pointe',
            content: 'Dance performed on the tips of the toes',
        },
        {
            link: 'https://tympanus.net/Tutorials/CSS3Lightbox/images/thumbs/2.jpg',
            url: 'https://tympanus.net/Tutorials/CSS3Lightbox/images/full/2.jpg',
            title: 'Port de bras',
            content: 'An exercise designed to develop graceful movement and disposition of the arms',
        },
        {
            link: 'https://tympanus.net/Tutorials/CSS3Lightbox/images/thumbs/3.jpg',
            url: 'https://tympanus.net/Tutorials/CSS3Lightbox/images/full/3.jpg',
            title: 'Plié',
            content: 'A movement in which a dancer bends the knees and straightens them again',
        },
        {
            link: 'https://tympanus.net/Tutorials/CSS3Lightbox/images/thumbs/4.jpg',
            url: 'https://tympanus.net/Tutorials/CSS3Lightbox/images/full/4.jpg',
            title: 'adagio',
            content: 'A movement or composition marked to be played adagio',
        },
        {
            link: 'https://tympanus.net/Tutorials/CSS3Lightbox/images/thumbs/5.jpg',
            url: 'https://tympanus.net/Tutorials/CSS3Lightbox/images/full/5.jpg',
            title: 'frapé',
            content: 'Involving a beating action of the toe of one foot against the ankle of the supporting leg',
        },
        {
            link: 'https://tympanus.net/Tutorials/CSS3Lightbox/images/thumbs/6.jpg',
            url: 'https://tympanus.net/Tutorials/CSS3Lightbox/images/full/6.jpg',
            title: 'glisade',
            content: 'One leg is brushed outward from the body, which then takes the weight while the second leg is brushed in to meet it',
        },
        {
            link: 'https://tympanus.net/Tutorials/CSS3Lightbox/images/thumbs/7.jpg',
            url: 'https://tympanus.net/Tutorials/CSS3Lightbox/images/full/7.jpg',
            title: 'je·té',
            content: 'A springing jump made from one foot to the other in any direction',
        },
        {
            link: 'https://tympanus.net/Tutorials/CSS3Lightbox/images/thumbs/8.jpg',
            url: 'https://tympanus.net/Tutorials/CSS3Lightbox/images/full/8.jpg',
            title: 'Piqué',
            content: 'Strongly pointed toe of the lifted and extended leg sharply lowers to hit the floor then immediately rebounds upward',
        },
        {
            link: 'https://tympanus.net/Tutorials/CSS3Lightbox/images/thumbs/9.jpg',
            url: 'https://tympanus.net/Tutorials/CSS3Lightbox/images/full/9.jpg',
            title: 'Arabesque',
            content: 'Position of the body supported on one leg, with the other leg extended behind the body with the knee straight',
        },
        {
            link: 'https://tympanus.net/Tutorials/CSS3Lightbox/images/thumbs/10.jpg',
            url: 'https://tympanus.net/Tutorials/CSS3Lightbox/images/full/10.jpg',
            title: 'Ballerina',
            content: 'A female ballet dancer',
        }
    ]

    function populate() {
        let ul = $('ul.lb-album.image_gallery');
        data.forEach((item, i) => {
            let li = $('<li>');
            li.data('url', item.url);
            li.data('txt', `${item.title}:${item.content}`);

            let a = $('<a>');
            a.attr('href', `image${i}`);
            
            let img = $('<img>');
            img.attr('src', item.link);
            img.attr('alt', `image${i}`);

            a.append(img);

            li.append(a);

            ul.append(li);
        });
        set_overview($('ul.lb-album.image_gallery li:first-child'));
    }
    populate();

    function prepare_image_overview(e) {
        e.preventDefault();
        e.stopPropagation();
        let target = $(e.target);
        if(target.is('span') || target.is('img')) target = $(e.target.parentElement.parentElement);
        else if(target.is('a')) target = $(e.target.parentElement);
        
        set_overview(target);

    }

    function set_overview(target) {
        let img = $('.image_overview--img');
        let title = $('.image_overview--desc p:first-child');
        let content = $('.image_overview--desc p:last-child');

        img.attr('src', target.data('url'))
        let text = target.data('txt');

        title.text(text.split(':')[0])
        content.text(text.split(':')[1])
    }

    $('ul.image_gallery li').each((_, li) => $(li).on('click', prepare_image_overview))
    
})