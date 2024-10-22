// Получаем элементы ползунков и текстовых полей
const minPriceRange = document.getElementById('minPriceRange');
const maxPriceRange = document.getElementById('maxPriceRange');
const minPriceInput = document.getElementById('minPrice');
const maxPriceInput = document.getElementById('maxPrice');
const carSort = document.getElementById('carSort');
// Функция для обновления значений текста на основе ползунков

function updatePriceValues() {
    minPriceInput.value = minPriceRange.value;
    maxPriceInput.value = maxPriceRange.value;
    filterCars();
}

// Функция для фильтрации автомобилей по цене
function filterCars() {
    const minPrice = parseInt(minPriceRange.value);
    const maxPrice = parseInt(maxPriceRange.value);
    const carRows = document.querySelectorAll('#carTableBody tr');

    carRows.forEach(row => {
        const price = parseInt(row.getAttribute('data-price'));
        if (price >= minPrice && price <= maxPrice) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

// Слушатели событий для ползунков
minPriceRange.addEventListener('input', updatePriceValues);
maxPriceRange.addEventListener('input', updatePriceValues);

// Также синхронизируем текстовые поля с ползунками
minPriceInput.addEventListener('input', () => {
    minPriceRange.value = minPriceInput.value;
    filterCars();
});
maxPriceInput.addEventListener('input', () => {
    maxPriceRange.value = maxPriceInput.value;
    filterCars();
});

// Инициализация фильтрации при загрузке страницы
document.addEventListener('DOMContentLoaded', filterCars);






// Функция для сортировки автомобилей
function sortCars() {
const sortValue = carSort.value;
const carRows = Array.from(document.querySelectorAll('#carTableBody tr'));

// Определяем функцию сравнения на основе выбранного значения
carRows.sort((a, b) => {
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

// Очищаем текущую таблицу и добавляем отсортированные строки
const carTableBody = document.getElementById('carTableBody');
carTableBody.innerHTML = '';
carRows.forEach(row => carTableBody.appendChild(row));
}

// Слушатель события для селекта
carSort.addEventListener('change', sortCars);



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

