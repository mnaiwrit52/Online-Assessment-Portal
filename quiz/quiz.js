let ans = [];

const start_btn = document.querySelector(".start-quiz");
const info_list = document.querySelector(".info-list");
const cont_2 = document.querySelector(".container-2");
const cont_1 = document.querySelector(".container-1");
const que_list = document.querySelector(".que-list");

start_btn.onclick = () =>{
    cont_2.classList.add("active-info");
    que_list.classList.add("active-que-list");
    showQuestions();
    setInterval(updateCountdown, 1000);
  }
  
  let q_num = 0;
  
  const next_btn = cont_2.querySelector(".next");
  
  next_btn.onclick = () =>{
    const selectedAns = document.querySelector('.selected');
    ans.push(selectedAns.textContent);
    console.log(ans);
    q_num++;
    if(q_num < 5){
      showQuestions(q_num);        
    }
    else{
      que_list.classList.remove("active-que-list");
      cont_2.classList.remove("active-info");
      cont_1.style.display = "none";
      const result = document.querySelector('.end-page');
      result.classList.add("active-end-page");
    }
}

function showQuestions(){
    const q_text = document.querySelector(".container-3");
    const q_opt = document.querySelectorAll(".option");
    q_opt.forEach(btn => btn.classList.remove("selected"));
    q_text.innerHTML = question[q_num].q;
    q_opt[0].innerText = `${question[q_num].opt[0]}`
    q_opt[1].innerText = `${question[q_num].opt[1]}`
    q_opt[2].innerText = `${question[q_num].opt[2]}`
    q_opt[3].innerText = `${question[q_num].opt[3]}`
    const no_q = document.querySelector(".no-q");
    no_q.innerHTML = `${q_num+1} of 5 Questions`;

    q_opt.forEach(button => {
        button.addEventListener("click", () => {
          // Remove the 'selected' class from all the buttons
          q_opt.forEach(btn => btn.classList.remove("selected"));
          
          // Add the 'selected' class to the clicked button
          button.classList.add("selected");
        });
      });
}

function showWelcome(){

}


const startingMinutes = 1;
const timerSec = document.querySelector(".timer-sec");
let time = startingMinutes * 60;


// function updateCountdown(){
//     let minutes = Math.floor(time / 60);
//     let seconds = time % 60;
//     seconds = seconds < 10 ? '0' + seconds : seconds;
//     timerSec.innerHTML = `${minutes}:${seconds}`;
//     time--;
// }