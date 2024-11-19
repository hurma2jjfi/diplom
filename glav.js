const minPriceRange = document.getElementById('minPriceRange');
const maxPriceRange = document.getElementById('maxPriceRange');
const minPriceInput = document.getElementById('minPrice');
const maxPriceInput = document.getElementById('maxPrice');
const carSort = document.getElementById('carSort'); // Предполагая, что у вас есть селектор для сортировки

// Функция для фильтрации автомобилей
function filterCars() {
    const minPrice = parseInt(minPriceRange.value);
    const maxPrice = parseInt(maxPriceRange.value);
    const carItems = document.querySelectorAll('.car-item');

    let visibleCars = []; // Для сохранения видимых автомобилей

    carItems.forEach(item => {
        const price = parseInt(item.getAttribute('data-price'));
        if (price >= minPrice && price <= maxPrice) {
            item.style.display = ''; // Показываем элемент
            visibleCars.push(item); // Добавляем его в массив видимых автомобилей
        } else {
            item.style.display = 'none'; // Скрываем элемент
        }
    });

    return visibleCars; // Возвращаем массив видимых элементов
}

// Функция для сортировки автомобилей
function sortCars(filteredCars) {
    const sortValue = carSort.value;

    // Определяем функцию сравнения на основе выбранного значения
    filteredCars.sort((a, b) => {
        let comparison = 0;

        // Получаем значения для сравнения
        const priceA = parseInt(a.getAttribute('data-price'));
        const priceB = parseInt(b.getAttribute('data-price'));
        const yearA = parseInt(a.getAttribute('data-year'));
        const yearB = parseInt(b.getAttribute('data-year'));

        switch (sortValue) {
            case 'asc-price':
                comparison = priceA - priceB;
                break;
            case 'desc-price':
                comparison = priceB - priceA;
                break;
            case 'new-first':
                comparison = yearB - yearA; // Новые автомобили первыми
                break;
            case 'old-first':
                comparison = yearA - yearB; // Старые автомобили первыми
                break;
            default:
                comparison = 0; // По умолчанию не сортируем
        }

        return comparison;
    });

    // Очищаем текущий список и добавляем отсортированные строки
    const carGrid = document.querySelector('.car-grid');
    carGrid.innerHTML = '';
    filteredCars.forEach(item => carGrid.appendChild(item));
}

// Функция для обновления значений в инпутах
function updateValues() {
    minPriceInput.value = minPriceRange.value;
    maxPriceInput.value = maxPriceRange.value;
}

// Слушатели событий
carSort.addEventListener('change', () => {
    const filteredCars = filterCars(); // Сначала фильтруем
    sortCars(filteredCars); // Затем сортируем отфильтрованные автомобили
});

// Изменение значений при перемещении слайдеров
minPriceRange.addEventListener('input', () => {
    updateValues(); // Обновляем текстовое поле
    filterCars(); // Обновляем отображение после изменения
});

maxPriceRange.addEventListener('input', () => {
    updateValues(); // Обновляем текстовое поле
    filterCars(); // Обновляем отображение после изменения
});

// Изменение значений при ручном вводе
minPriceInput.addEventListener('input', () => {
    minPriceRange.value = minPriceInput.value;
    filterCars(); // Обновляем отображение после изменения
});

maxPriceInput.addEventListener('input', () => {
    maxPriceRange.value = maxPriceInput.value;
    filterCars(); // Обновляем отображение после изменения
});

// Инициализация
updateValues(); // Чтобы задать начальные значения



$(function() {
    $('.list-heading').on('click', function(e) {
      e.preventDefault();
      if ($(this).hasClass('active')) {
        $(this).removeClass('active');
        $(this).next()
        .stop()
        .slideUp(300);
      } else {
        $(this).addClass('active');
        $(this).next()
        .stop()
        .slideDown(300);
      }
    });
  });


  $(document).ready(function(){
    $('#phone__fieldset').mask('+7 (999) 999-99-99');
});

gsap.to(".line", { 
    duration: 2, 
    opacity: 1, 
    y: 30, 
    scale: 1.1, // Увеличиваем размер на 10%
    ease: "power3.out",
    repeat: -1, // Бесконечное повторение
    yoyo: true, // Возврат к исходной позиции

});

// Обработчик события input для поиска
document.getElementById('search-input').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const carItems = document.querySelectorAll('.car-item');
    let foundCount = 0; // Счетчик найденных элементов

    carItems.forEach(function(carItem) {
        const carName = carItem.querySelector('.car-name').textContent.toLowerCase();
        if (carName.includes(searchTerm)) {
            carItem.style.display = ''; // Показываем элемент
            foundCount++; // Увеличиваем счетчик
        } else {
            carItem.style.display = 'none'; // Скрываем элемент
        }
    });

    // Показать или скрыть сообщение о том, что нет результатов
    const noResultsMessage = document.getElementById('no-results');
    const resultsCountMessage = document.getElementById('results-count');
    
    if (foundCount === 0) {
        noResultsMessage.style.display = ''; // Показываем сообщение о отсутствии результатов
        resultsCountMessage.textContent = ''; // Очищаем сообщение о количестве
    } else {
        noResultsMessage.style.display = 'none'; // Скрываем сообщение о отсутствии результатов
        resultsCountMessage.textContent = `Найдено: ${foundCount} по вашему запросу`; // Обновляем сообщение с количеством найденных
    }
});

// Обработчик события blur для очистки данных при потере фокуса
document.getElementById('search-input').addEventListener('blur', function() {
    this.value = ''; // Очистка поля ввода
    const carItems = document.querySelectorAll('.car-item');

    // Сброс отображения всех элементов
    carItems.forEach(function(carItem) {
        carItem.style.display = ''; // Показываем все элементы
    });

    // Скрытие сообщений
    const noResultsMessage = document.getElementById('no-results');
    const resultsCountMessage = document.getElementById('results-count');
    
    noResultsMessage.style.display = 'none'; // Скрываем сообщение о отсутствии результатов
    resultsCountMessage.textContent = ''; // Очищаем сообщение о количестве
});


document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("modal");
    const btnCheck = document.getElementById("btn__check");
    const spanClose = document.getElementsByClassName("close")[0];

    btnCheck.onclick = function() {
        // Прокручиваем к верхней части страницы
        window.scrollTo({top: 0, behavior: 'smooth'});

        // Показываем модальное окно
        modal.style.display = "block";
        
        // Блюрим фон
        
    };

    // Закрытие модального окна
    spanClose.onclick = function() {
        modal.style.display = "none";
        document.body.style.filter = "none"; // Убираем блюр с фона
    };

    // Закрытие по клику вне модального окна
    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
            document.body.style.filter = "none"; // Убираем блюр с фона
        }
    };
});

$(document).ready(function(){
    $('#phone__fieldset__tw').mask('+7 (999) 999-99-99');
});


document.addEventListener("DOMContentLoaded", function() {
    var adContainer = document.getElementById("adContainer");
    var closeButton = document.getElementById("closeButton");
  
    setTimeout(function() {
      adContainer.classList.add("show");
      disableScroll(); 
    }, 1000); 
  
    closeButton.addEventListener("click", function() {
      adContainer.classList.remove("show");
      enableScroll(); 
    });
  
    setTimeout(function() {
      adContainer.classList.remove("show");
      enableScroll(); 
    }, 5000); 
  
    function disableScroll() {
      window.addEventListener("wheel", preventDefault, { passive: false });
      window.addEventListener("touchmove", preventDefault, { passive: false });
    }
  
    function enableScroll() {
      window.removeEventListener("wheel", preventDefault);
      window.removeEventListener("touchmove", preventDefault);
    }
  
    function preventDefault(event) {
      event.preventDefault();
    }
  });


  document.getElementById('carSort').addEventListener('change', function() {
    const selectedValue = this.value;
    
    // Удаляем префикс из значения для получения id элемента
    const elementId = selectedValue.replace('asc-', '').replace('desc-', '').replace('-first', '');
    
    // Получаем элемент для прокрутки
    const targetElement = document.getElementById(elementId);
    
    // Прокручиваем страницу до элемента
    if (targetElement) {
        targetElement.scrollIntoView({ behavior: 'smooth' });
    }
});


// Анимация появления блока
gsap.fromTo("#succ", { opacity: 0 }, {
    x: 0, // возвращаем блок на исходную позицию
    duration: 1.5, // длительность анимации появления 1 секунда
    ease: "power2.inOut", // тип анимации (плавное ускорение и замедление)
    opacity: 1, // прозрачность блока после появления
});


gsap.delayedCall(3, function() {
    
    gsap.to("#succ", {
        x: "100%", 
        duration: 1, 
        ease: "power2.inOut" 
    });
});

document.getElementById('myForm').addEventListener('submit', function(event) {
    var phoneField = document.getElementById('phone__fieldset__tw');
    var nameField = document.getElementById('data__search__name');
    var isValid = true;

    if (phoneField.value.trim() === '') {
        phoneField.style.border = '1px solid red';
        document.getElementById('phone-error').style.display = 'block';
        isValid = false;
    } else {
        phoneField.style.border = '1px solid #ccc';
        document.getElementById('phone-error').style.display = 'none';
    }

    if (nameField.value.trim() === '') {
        nameField.style.border = '1px solid red';
        document.getElementById('name-error').style.display = 'block';
        isValid = false;
    } else {
        nameField.style.border = '1px solid #ccc';
        document.getElementById('name-error').style.display = 'none';
    }

    if (!isValid) {
        event.preventDefault(); 
    }
});


$(document).ready(function() {
    $('.slick-carousel').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        dots: true,
        cssEase: 'ease-in-out',
        speed: 500,
        fade: true,
        infinite: true,
        pauseOnFocus: false,
        pauseOnHover: false
    });


    $('.slick-dot').on('click', function() {
        var index = $(this).index();
        $('.slick-carousel').slick('slickGoTo', index);
    });
    
});


gsap.fromTo(".animate", { opacity: 100}, {
    duration: 1,
    opacity: 1,
    ease: "power2.out",

});


gsap.from(".nav-item", {opacity: 0, duration: 2, delay: 0, y: 25, ease: "expo.out", stagger: .2});


const poster1 = document.getElementById("poster1");
const poster2 = document.getElementById("poster2");


gsap.set(poster1, { y: 0 });
gsap.set(poster2, { y: 0 });

function onScroll() {
    const scrollY = window.scrollY;

    gsap.to(poster1, {
        y: scrollY * -0.3, 
        duration: 0.5,
        ease: "power1.out"
    });

    gsap.to(poster2, {
        y: scrollY * -0.6, 
        duration: 0.5,
        ease: "power1.out"
    });
}


window.addEventListener("scroll", onScroll);

document.querySelector('.nav-item a').addEventListener('click', function(event) {
    event.preventDefault(); 
    const targetId = this.getAttribute('href'); 
    const targetElement = document.querySelector(targetId); 
    targetElement.scrollIntoView({ behavior: 'smooth' });
});

document.querySelector('a[href="#rev"]').addEventListener('click', function(e) {
  e.preventDefault();

  document.querySelector('#rev').scrollIntoView({
    behavior: 'smooth'
  });
});



 $(document).ready(function() {
    $("#openModal").click(function() {
        $("#myModal").css("display", "block");
    });

    // Закрытие модального окна
    $(".close").click(function() {
        $("#myModal").css("display", "none");
    });

    // Закрытие модального окна при клике вне его
    $(window).click(function(event) {
        if ($(event.target).is("#myModal")) {
            $("#myModal").css("display", "none");
        }
    });

    $(document).ready(function() {
        $("#reviewForm").submit(function(event) {
            event.preventDefault(); // Prevent default form submission
    
            // Clear previous error messages
            $("#responseMessage").html('');
            let isValid = true;
    
            // Validate car selection
            if ($("#id_car").val() === "") {
                $("#id_car").css("border-color", "red"); // Highlight empty field
                $("#responseMessage").append("<p style='color:red;'>Выберите автомобиль.</p>");
                isValid = false;
            } else {
                $("#id_car").css("border-color", ""); // Reset border color
            }
    
            // Validate rating selection
            if ($("#rating").val() === "") {
                $("#rating").css("border-color", "red");
                $("#responseMessage").append("<p style='color:red;'>Выберите рейтинг.</p>");
                isValid = false;
            } else {
                $("#rating").css("border-color", "");
            }
    
            // Validate review textarea
            if ($.trim($("#review").val()) === "") {
                $("#review").css("border-color", "red");
                $("#responseMessage").append("<p style='color:red;'>Ваш отзыв не может быть пустым:(</p>");
                isValid = false;
            } else {
                $("#review").css("border-color", "");
            }
    
            // If all fields are valid, proceed with AJAX submission
            if (isValid) {
                $.ajax({
                    type: "POST",
                    url: "submit_review.php",
                    data: $(this).serialize(), // Serialize form data
                    success: function(response) {
                        $("#responseMessage").html('');
                        const successMessage = $("<p style='color:green;'>Отзыв успешно отправлен :)</p>");
                        $("#responseMessage").append(successMessage);
    
                        
                        successMessage.hide().fadeIn(500); 
    
                        $("#reviewForm")[0].reset(); 
                    },
                    error: function() {
                        $("#responseMessage").html("<p style='color:red;'>Произошла ошибка. Попробуйте еще раз.</p>");
                    }
                });
            }
        });
    });
});



