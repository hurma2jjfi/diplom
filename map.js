document.addEventListener("DOMContentLoaded", function () {
    const loading = document.getElementById('loading');
    const mapElement = document.getElementById('map');
    const carInfo = document.getElementById('car-info');
    const carName = document.getElementById('car-name');
    const carStatus = document.getElementById('car-status');
    const carPrice = document.getElementById('car-price');
    const currency = document.getElementById('currency');
    const carLink = document.getElementById('car-link'); // Ссылка

    const exchangeRates = {
        RUB: 1,
        USD: 0.013,
        EUR: 0.012,
    };

    const selectedCurrency = 'RUB'; // Установите желаемую валюту

    const cars = [
        { id: 1, name: 'Toyota Camry', latitude: 46.3498, longitude: 48.0378, available: true, price: 500, image: './image/Remove-bg.ai_1731654689097.png' },
        { id: 2, name: 'Hyundai Solaris', latitude: 46.3500, longitude: 48.0380, available: false, price: 400, image: './image/Remove-bg.ai_1731654689097.png' },
        { id: 3, name: 'Kia Rio', latitude: 46.3480, longitude: 48.0360, available: true, price: 450, image: './image/Remove-bg.ai_1731654689097.png' },
        { id: 4, name: 'Nissan Almera', latitude: 46.3525, longitude: 48.0321, available: true, price: 420, image: './image/Remove-bg.ai_1731654689097.png' },
        { id: 5, name: 'Renault Logan', latitude: 46.3450, longitude: 48.0450, available: false, price: 390, image: './image/Remove-bg.ai_1731654689097.png' },
        { id: 6, name: 'Volkswagen Polo', latitude: 46.3550, longitude: 48.0500, available: true, price: 480, image: './image/Remove-bg.ai_1731654689097.png' },
        { id: 7, name: 'Skoda Rapid', latitude: 46.3485, longitude: 48.0265, available: true, price: 460, image: './image/Remove-bg.ai_1731654689097.png' },
        { id: 8, name: 'Ford Focus', latitude: 46.3510, longitude: 48.0400, available: false, price: 500, image: './image/Remove-bg.ai_1731654689097.png' },
        { id: 9, name: 'Lada Vesta', latitude: 46.3440, longitude: 48.0330, available: true, price: 320, image: './image/Remove-bg.ai_1731654689097.png' },
        { id: 10, name: 'Chevrolet Tracker', latitude: 46.3560, longitude: 48.0432, available: true, price: 540, image: './image/Remove-bg.ai_1731654689097.png' },
        { id: 11, name: 'Mazda 3', latitude: 46.3465, longitude: 48.0480, available: false, price: 520, image: './image/Remove-bg.ai_1731654689097.png' },
        { id: 12, name: 'Peugeot 308', latitude: 46.3530, longitude: 48.0410, available: true, price: 500, image: './image/Remove-bg.ai_1731654689097.png' }
    ];

    const customIcon = L.icon({
        iconUrl: './image/Group 248.svg',
        iconSize: [115, 116],
        iconAnchor: [16, 32],
        popupAnchor: [0, -32]
    });

    // Установить таймер на 3 секунды для загрузки
    setTimeout(() => {
        loading.style.display = 'none'; // Скрываем индикатор загрузки
        mapElement.style.display = 'block'; // Показываем карту

        // Инициализация карты
        const map = L.map(mapElement).setView([46.3498, 48.0378], 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        }).addTo(map);

        cars.forEach(car => {
            const marker = L.marker([car.latitude, car.longitude], { icon: customIcon }).addTo(map);
            marker.on('click', () => selectCar(car));
            marker.bindPopup(`
                <div style="text-align: center;">
                    <div style="position: relative; display: inline-block;">
                        <img src="${car.image}" alt="${car.name}" style="width: 100px; height: auto;"/>
                        <div style="font-family: 'Oswald', sans-serif; position: absolute; top: 0; right: 0; animation: pulse-animation 1.5s infinite; font-size: 12px; background-color: #F46767; color: white; border-radius: 50%; width: 20px; height: 20px; text-align: center; line-height: 20px;">
                            ${car.id}
                        </div>
                    </div>
                    <p>${car.name} - ${car.available ? 'Доступен' : 'Не доступен'}</p>
                </div>
            `);
        });

        // Анимация появления карты
        gsap.fromTo(mapElement, { opacity: 0 }, { opacity: 1, duration: 1.5 });

        // Показываем ссылку после загрузки карты
        carLink.style.display = 'block'; // Показываем ссылку
    }, 3000);

    // Функция выбора автомобиля
    function selectCar(car) {
        carInfo.style.display = 'block'; // Показываем информацию о автомобиле
        carName.textContent = car.name;
        carStatus.textContent = car.available ? 'Доступен' : 'Не доступен';
        carPrice.textContent = convertedPrice(car.price);
        currency.textContent = selectedCurrency;
    }

    // Функция для конвертации цены
    function convertedPrice(price) {
        return (price * exchangeRates[selectedCurrency]).toFixed(2);
    }
});
