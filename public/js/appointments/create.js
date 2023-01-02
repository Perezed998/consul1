let $doctor , $date , $specialty , iRadio;
let $hoursMorning,$hoursAfternoon,$titleMorning,$titleAfternoon;

const titleMorning = `En la mañana`;

const titleAfternoon = `En la tarde`;


const noHours = `<h5 class="text-danger">
No hay horas disponibles.
</h5> `;

    $(function(){
         $specialty = $('#specialty');
         $doctor = $('#doctor');
         $date= $('#scheduled_date');
         $titleMorning= $('#titleMorning');
         $hoursMorning = $('#hoursMorning');
         $titleAfternoon = $('#titleAfternoon');
         $hoursAfternoon = $('#hoursAfternoon');



         $specialty.change(() =>{
            const specialtyId = $specialty.val();
            const url = `/consul1/public/especialidades/${specialtyId}/medicos`;
            $.getJSON(url , onDoctorLoaded);
        });

        $doctor.change(loadHours);
        $date.change(loadHours);

    });

function onDoctorLoaded(doctors){

    let htmlOptions = '<option value="">-- Seleccionar Uno --</option>';
    doctors.forEach(doctor => {

        htmlOptions += `<option value="${doctor.id}">${doctor.name}</option> `;

        //loadHours();
        
    });

    $doctor.html(htmlOptions);

}

function loadHours(){
    const selectedDate = $date.val();
    const doctorId = $doctor.val();

    if(selectedDate !== '' && doctorId != null){
        const url = `/consul1/public/horarios/horas?date=${selectedDate}&doctor_id=${doctorId}`;
        $.getJSON(url,displayHours);   
        $('#mensaje1').hide(); //oculto mediante id 
    }
    else {
        $('#mensaje1').show(); //muestro mediante id
    }
    
}

function displayHours(data){

    let htmlHoursM = '';
    let htmlHoursA = '';

    iRadio = 0;

    if(data.morning){

        const morning_intervalos = data.morning;
        morning_intervalos.forEach(intervalo =>{
            htmlHoursM += getRadioIntervaloHTML(intervalo) ;
        });
    }

    if (!htmlHoursM != ""){
        htmlHoursM += noHours;
    }

    if(data.afternoon){

        const afternoon_intervalos = data.afternoon;
        afternoon_intervalos.forEach(intervalo =>{

            htmlHoursA += getRadioIntervaloHTML(intervalo) ;
        });
    }

    if (!htmlHoursA != ""){
        htmlHoursA += noHours;
    }

    $hoursMorning.html(htmlHoursM);
    $hoursAfternoon.html(htmlHoursA);
    $titleMorning.html(titleMorning)
    $titleAfternoon.html(titleAfternoon);
}


function getRadioIntervaloHTML(intervalo){

    const text = `${intervalo.start} - ${intervalo.end}`;

    return `<div class="custom-control custom-radio mb-3">
        <input type="radio" id="interval${iRadio}" name="sheduled_time" value="${intervalo.start}" class="custom-control-input" >
        <label class="custom-control-label" for="interval${iRadio++}">${text}</label>
        </div>`;
}