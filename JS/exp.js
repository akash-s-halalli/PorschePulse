function updateCarImage() {
    var carModelSelect = document.getElementById('car_model');
    var selectedCarImage = document.getElementById('selectedCar');

    var selectedModel = carModelSelect.value;
    var imagePath = '';

    // Set the image path based on the selected car model
    switch (selectedModel) {
        case '911':
            imagePath = 'Images/car1.png';
            break;
        case 'Cayman':
            imagePath = 'Images/car2.png';
            break;
        case 'Panamera':
            imagePath = 'Images/car3.png';
            break;
        case 'Taycan':
            imagePath = 'Images/car4.png';
            break;
        case 'Macan':
            imagePath = 'Images/car5.png';
            break;
        case 'Coupe':
            imagePath = 'Images/car6.png';
            break;
        default:
            imagePath = 'Images/car7.png'; // Default image
    }
    selectedCarImage.src = imagePath;
}
