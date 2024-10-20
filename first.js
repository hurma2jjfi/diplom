const customSelect = document.getElementById('customSelect');
    const optionsContainer = document.getElementById('options');
    const arrow = document.querySelector('.arrow');

    customSelect.addEventListener('click', () => {
        optionsContainer.style.display = optionsContainer.style.display === 'block' ? 'none' : 'block';
        customSelect.classList.toggle('open');
    
        // Плавное исчезновение/появление опций
        if (optionsContainer.style.display === 'block') {
            optionsContainer.style.maxHeight = optionsContainer.scrollHeight + 'px';
        } else {
            optionsContainer.style.maxHeight = '0';
        }
    });

    document.querySelectorAll('.option').forEach(option => {
        option.addEventListener('click', (e) => {
            customSelect.querySelector('span').textContent = e.target.textContent;
            optionsContainer.style.display = 'none';
            optionsContainer.style.maxHeight = '0'; // Скрываем опции
            customSelect.classList.remove('open'); // Возвращаем стрелку в исходное положение
        });
    });

    // Закрытие опций при клике вне селекта
    document.addEventListener('click', function(event) {
        if (!customSelect.contains(event.target)) {
            optionsContainer.style.display = 'none';
            optionsContainer.style.maxHeight = '0'; // Скрываем опции
            customSelect.classList.remove('open'); // Возвращаем стрелку в исходное положение
        }
    });

    
    document.addEventListener('DOMContentLoaded', () => {
        const carousel = document.getElementById('carousel');
        let isDown = false;
        let startX;
        let scrollLeft;
    
        // Устанавливаем стиль курсора по умолчанию
        carousel.style.cursor = 'default'; // Используем курсор "grab" по умолчанию
    
        // Функция, которая обрабатывает начало перетаскивания
        const mouseDownHandler = (e) => {
            isDown = true;
            startX = e.pageX - carousel.offsetLeft;
            scrollLeft = carousel.scrollLeft;
            carousel.style.cursor = 'default'; // Меняем курсор на "grabbing"
        };
    
        // Функция, которая обрабатывает окончание перетаскивания
        const mouseUpHandler = () => {
            isDown = false;
            carousel.style.cursor = 'default'; // Возвращаем курсор
        };
    
        // Функция, которая обрабатывает движение мыши
        const mouseMoveHandler = (e) => {
            // Проверяем, была ли нажата левая кнопка мыши
            if (!isDown || e.button !== 0) return; // Если не нажата кнопка мыши или это не левая кнопка, выходим из функции
            
            e.preventDefault(); // Предотвращаем выделение текста
            const x = e.pageX - carousel.offsetLeft;
            const walk = (x - startX) * 1.5; // Определяем, насколько прокручивать (можно настроить)
            carousel.scrollLeft = scrollLeft - walk; // Изменяем scrollLeft
        };
    
        // Добавляем слушатели событий
        carousel.addEventListener('mousedown', mouseDownHandler);
        carousel.addEventListener('mouseleave', mouseUpHandler);
        carousel.addEventListener('mouseup', mouseUpHandler);
        carousel.addEventListener('mousemove', mouseMoveHandler);
    
        // Для поддержки сенсорных экранов
        carousel.addEventListener('touchstart', (e) => {
            isDown = true;
            startX = e.touches[0].pageX - carousel.offsetLeft;
            scrollLeft = carousel.scrollLeft;
        });
    
        carousel.addEventListener('touchend', mouseUpHandler);
        
        carousel.addEventListener('touchmove', (e) => {
            if (!isDown) return; // Если не нажата кнопка, выходим из функции
            const x = e.touches[0].pageX - carousel.offsetLeft;
            const walk = (x - startX) * 1.5; // Можно настроить коэффициент для плавности
            carousel.scrollLeft = scrollLeft - walk; // Изменяем scrollLeft
        });
    });
    

    gsap.to("#title__txt", { 
        duration: 2, 
        opacity: 1, 
        x: 30, // Двигаем текст вправо
        scale: 1.1, // Увеличиваем размер на 10%
        ease: "power3.out",
        repeat: -1, // Бесконечное повторение
        yoyo: true, // Возврат к исходной позиции
        stagger: 0.1 // Задержка между повторами
    });

    gsap.to("#title__txt__tw", { 
        duration: 2, 
        opacity: 1, 
        scale: 1.1, // Увеличиваем размер на 10%
        ease: "power3.out",
        repeat: -1, // Бесконечное повторение
        yoyo: true, // Возврат к исходной позиции
        stagger: 0.1 // Задержка между повторами
    });

    gsap.to(".select-wrapper", { 
        duration: 2, 
        opacity: 1, 
        x: 33,
        scale: 1.1, // Увеличиваем размер на 10%
        ease: "power3.out",
        repeat: -1, // Бесконечное повторение
        yoyo: true, // Возврат к исходной позиции
        stagger: 0.1 // Задержка между повторами
    });

    gsap.to(".background__blur", { 
        duration: 2, 
        opacity: 1, 
        x: 0,
        scale: 1.1, // Увеличиваем размер на 10%
        ease: "circ.out", // Эффект замедления
        repeat: -1, // Бесконечное повторение
        yoyo: true, // Возврат к исходной позиции
        stagger: 0.1 // Задержка между повторами
    });

    
      