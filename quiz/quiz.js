const start_btn = document.querySelector(".start-quiz");
const info_list = document.querySelector(".info-list");
const cont_2 = document.querySelector(".container-2")

start_btn.onclick = () =>{
    cont_2.classList.add("active-info")
    showQuestions();
}

let q_num = 0;

const next_btn = cont_2.querySelector(".next");

next_btn.onclick = () =>{
    q_num++;
    showQuestions(q_num);        
}

function showQuestions(){
    const q_text = document.querySelector(".container-3");
    const q_opt = document.querySelector(".container-4");
    q_text.innerHTML = question[q_num].q;    
    q_opt.innerHTML = '<div class="option-1 btn btn-outline-dark">'+question[q_num].opt[0]+'</div>'
                        + '<div class="option-2 btn btn-outline-dark">'+question[q_num].opt[1]+'</div>'
                        + '<div class="option-3 btn btn-outline-dark">'+question[q_num].opt[2]+'</div>'
                        + '<div class="option-4 btn btn-outline-dark">'+question[q_num].opt[3]+'</div>'
    
    const no_q = document.querySelector(".no-q");
    no_q.innerHTML = `${q_num+1} of 5 Questions`;
}