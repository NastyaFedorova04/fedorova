function deliveryTime(day, time) {
    const workingDays = ['понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'];
    const workingHoursStart = 8;
    const workingHoursEnd = 16;
  
    let currentDayIndex = workingDays.indexOf(day.toLowerCase());
    let deliveryDay;
    let deliveryStart;
    let deliveryEnd;
  
    if (currentDayIndex !== -1 && time >= 0 && time <= 23) {
      if (time >= workingHoursStart && time < workingHoursEnd) {
        deliveryDay = day;
        deliveryStart = time < 16 ? 16 : 8;
        deliveryEnd = 20;
      } else if (time < workingHoursStart) {
        deliveryDay = day;
        deliveryStart = 8;
        deliveryEnd = 16;
      } else {
        currentDayIndex = (currentDayIndex + 1) % 6;
        deliveryDay = workingDays[currentDayIndex];
        deliveryStart = 8;
        deliveryEnd = 16;
      }
      return `Заказ можно будет получить ${deliveryDay} c ${deliveryStart}.00 до ${deliveryEnd}.00`;
    } else {
      return 'Извините, в данный день у компании выходной';
    }
  }
  
  console.log(deliveryTime('понедельник', 7));
  console.log(deliveryTime('пятница', 19)); 
  console.log(deliveryTime('воскресенье', 10)); 
  