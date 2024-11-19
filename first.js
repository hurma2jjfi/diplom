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

    
    gsap.to(".phone__background", { 
        duration: 1,
        opacity: 1,
        x: 10,
        y: 10,
        repeat: -1,
        stagger: 0.1, // Задержка между повторами
        yoyo: true, // Возврат к исходной позиции
        ease: "power2.out"
    });

    gsap.from(".nav-item", {opacity: 0, duration: 2, delay: 0, y: 25, ease: "expo.out", stagger: .2});
    gsap.from("#btn", {opacity: 0, duration: 2, delay: 0, y: 25, ease: "expo.out", stagger: .2});
    gsap.from("#logo", {opacity: 0, duration: 2, delay: 0, y: 25, ease: "expo.out", stagger: .2});



    document.addEventListener('DOMContentLoaded', function() {
        const slider = document.querySelector('.review-slider');
        
        // Дублирование карточек для бесконечного прокручивания
        const cards = Array.from(slider.children);
        cards.forEach(card => {
            const clone = card.cloneNode(true);
            slider.appendChild(clone);
        });
    
        let scrollAmount = 0; // Сколько уже прокручено
        const scrollStep = 1; // Шаг прокрутки
        const scrollSpeed = 15; // Уменьшенный интервал между шагами для более плавной прокрутки
        let scrollInterval;
    
        const startScrolling = () => {
            scrollInterval = setInterval(() => {
                scrollAmount += scrollStep;
                slider.scrollLeft += scrollStep;
    
                // Если достигли конца первой части, сбрасываем прокрутку
                if (scrollAmount >= slider.scrollWidth / 2) {
                    slider.scrollLeft = 0; // Сброс до начала
                    scrollAmount = 0; // Сброс счетчика
                }
            }, scrollSpeed); // Увеличенный интервал между шагами для медленной прокрутки
        };
    
        startScrolling(); // Запуск автоматической прокрутки
    
        // Остановка автоматической прокрутки при наведении мыши
        slider.addEventListener('mouseover', () => clearInterval(scrollInterval));
        
        // Возобновление при уходе мыши
        slider.addEventListener('mouseout', () => startScrolling());
    
        // Обработка события изменения размера окна
        window.addEventListener('resize', () => {
            if (scrollInterval) { // Если интервал запущен, перезапускаем его
                clearInterval(scrollInterval);
                startScrolling();
            }
        });
    });


    const text = "ОТЗЫВЫ ПОЛЬЗОВАТЕЛЕЙ:";
    let index = 0;
    
    function typeText() {
        const typingElement = document.getElementById("typing-text");
        const cursorElement = document.getElementById("cursor");
    
        // Clear the text content
        typingElement.textContent = "";
    
        // Function to type out the text
        function typeCharacter() {
            if (index < text.length) {
                // Append the next character to the element
                typingElement.textContent += text.charAt(index);
                index++;
                typingElement.style.opacity = 1; // Fade in
                setTimeout(typeCharacter, 160); // Adjust speed here (160ms per character)
            } else {
                // Hide cursor before starting to erase
                cursorElement.style.opacity = 0;
                // Start fading out while erasing
                eraseText();
            }
        }
    
        // Function to erase the text with fade out effect
        function eraseText() {
            if (index > 0) {
                typingElement.style.opacity = 1; // Ensure it's visible
                // Remove the last character
                typingElement.textContent = typingElement.textContent.slice(0, -1);
                index--;
                setTimeout(eraseText, 100); // Adjust speed here (100ms per character)
            } else {
                // Fade out completely after erasing
                typingElement.style.opacity = 0; // Fade out
                setTimeout(() => {
                    index = 0; // Reset index
                    cursorElement.style.opacity = 1; // Show cursor again
                    typeText(); // Start typing again
                }, 500); // Wait for fade out to complete (0.5 seconds)
            }
        }
    
        cursorElement.style.opacity = 1; // Show cursor at the start of typing
        typeCharacter(); // Start typing
    }
    
    typeText();


    document.addEventListener('DOMContentLoaded', function() {
        const tabLinks = document.querySelectorAll('.tab-links a');
        const tabs = document.querySelectorAll('.tab');
    
        tabLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
    
                
                tabLinks.forEach(item => item.parentElement.classList.remove('active'));
                tabs.forEach(tab => tab.classList.remove('active'));
    
                
                this.parentElement.classList.add('active');
                const targetTab = document.querySelector(this.getAttribute('href'));
                targetTab.classList.add('active');
            });
        });
    });


    document.addEventListener('DOMContentLoaded', function() {
        const tabsContainer = document.querySelector('.tabs-container');
        const tabLinks = tabsContainer.querySelectorAll('.tab-item a');
        const tabs = tabsContainer.querySelectorAll('.tab');
    
        tabLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
    
                
                tabLinks.forEach(item => item.parentElement.classList.remove('active'));
                tabs.forEach(tab => tab.classList.remove('active'));
    
                
                this.parentElement.classList.add('active');
                const targetTab = document.querySelector(this.getAttribute('href'));
                targetTab.classList.add('active');
            });
        });
    });
    






    
    document.addEventListener('DOMContentLoaded', function() {
        const faqContainer = document.getElementById('faqContainer');
        const faqs = [
            { question: "— Какой тип парковки выбрать?", answer: "• Выбирайте городские парковки" },
            { question: "— Где можно парковаться бесплатно?", answer: " • На открытых платных и бесплатных парковках" },
            { question: "— Что делать за шлагбаумом?", answer: "• Не оставляйте машину за шлагбаумом" },
            { question: "— Можно ли ездить по всем областям?", answer: "• Да, вы можете ездить по всем областям" }
        ];
    
       
        faqs.forEach(faq => {
            const item = document.createElement('div');
            item.classList.add('faq-item');
    
            const question = document.createElement('h3');
            question.textContent = faq.question;
    
            const answer = document.createElement('p');
            answer.classList.add('faq-answer');
            answer.textContent = faq.answer;
    
            item.appendChild(question);
            item.appendChild(answer);
            faqContainer.appendChild(item);
    
          
            item.addEventListener('click', () => {
                answer.classList.toggle('show'); 
            });
        });
    });
    


    
    