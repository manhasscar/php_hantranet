let major1 = [
    {v:"", t:"대학"},
    {v:"문과대학", t:"문과대학"},
    {v:"사범대학", t:"사범대학"},
    {v:"공과대학", t:"공과대학"},
    {v:"스마트융합대학", t:"스마트융합대학"},
    {v:"경상대학", t:"경상대학"},
    {v:"사회과학대학", t:"사회과학대학"},
    {v:"생명나노과학대학", t:"생명나노과학대학"},
    {v:"탈메이지교양.융합대학", t:"탈메이지교양.융합대학"},
    {v:"아트&디자인테크놀로지대학", t:"아트&디자인테크놀로지대학"}

];
let major_0=[
    {v:"",t:"전공"}
];
let major_1 = [
{v:"국어국문 창작학과", t:"국어국문 창작학과"},
{v:"영어영문학과", t:"영어영문학과"},
{v:"외국어문학부", t:"외국어문학부"},
{v:"문헌정보학과", t:"문헌정보학과"},
{v:"사학과", t:"사학과"},
{v:"기독교학과", t:"기독교학과"}
];
let major_2=[
{v:"국어교육과", t:"국어교육과"},
{v:"영어교육과", t:"영어교육과"},
{v:"교육학과", t:"교육학과"},
{v:"역사교육과", t:"역사교육과"},
{v:"미술교육과", t:"미술교육과"},
{v:"수학교육과", t:"수학교육과"}
];
let major_3=[
{v:"정보통신공학과", t:"정보통신공학과"},
{v:"전기전자공학과", t:"전기전자공학과"},
{v:"멀티미디어공학과", t:"멀티미디어공학과"},
{v:"건축학과", t:"건축학과"},
{v:"토목 건축공학부", t:"토목 건축공학부"},
{v:"기계공학과", t:"기계공학과"},
{v:"화학공학과", t:"화학공학과"},
{v:"신소재공학과", t:"신소재공학과"}

];
let major_4=[
{v:"컴퓨터공학과", t:"컴퓨터공학과"},
{v:"산업경영공학과", t:"산업경영공학과"},
{v:"AI융합학과", t:"AI융합학과"},
{v:"수학과", t:"수학과"},
{v:"빅데이터응용학과", t:"빅데이터응용학과"}           
];
let major_5=[
{v:"경영학과", t:"경영학과"},
{v:"회계학과", t:"회계학과"},
{v:"무역학과", t:"무역학과"},
{v:"경제학부", t:"경제학부"},
{v:"호텔항공경영학과", t:"호텔항공경영학과"}, 
{v:"경영정보학과", t:"경영정보학과"}        
];
let major_6=[
{v:"법학부", t:"법학부"},
{v:"행정학과", t:"행정학과"},
{v:"경찰학과", t:"경찰학과"},
{v:"정치.언론학과", t:"정치.언론학과"},
{v:"사회복지학과", t:"사회복지학과"}, 
{v:"상담심리학과", t:"상담심리학과"},
{v:"사회적경제기업학과", t:"사회적경제기업학과" }      
];
let major_7=[
{v:"생명시스템과학과", t:"생명시스템과학과"},
{v:"식품영양학과", t:"식품영양학과"},
{v:"화학과", t:"화학과"},
{v:"간호학과", t:"간호학과"},
{v:"스포츠과학과", t:"스포츠과학과"}, 
{v:"바이오제약공학과", t:"바이오제약공학과"},  
];
let major_8=[
    {v:"자유전공학부", t:"자유전공학부"},
    {v:"창의융합학부", t:"창의융합학부"} 
];
let major_9=[
    {v:"융합디자인학과", t:"융합디자인학과"},
    {v:"회화과", t:"회화과"},
    {v:"의류학과", t:"의류학과"},
    {v:"미디어영상학과", t:"미디어영상학과"}
];
function loadMajor(){
    let h=[];
    major1.forEach(item => {
      
            h.push('<option value="' + item.v + '">' + item.t + '</option>');
        
        
    });

    document.getElementById("major1").innerHTML = h.join("");
}

function changeMajor2(){
    let major1 = document.getElementById("major1").value;
    let h=[];
    if(major1 == ""){
        major_0.forEach(item=>{
        h.push('<option value="' + item.v + '">' + item.t + '</option>');
        });
    }else{
        if(major1 == "문과대학"){
            major_1.forEach(item=>{
            h.push('<option value="' + item.v +'">' + item.t + '</option>');
            });
        }else if(major1 =="사범대학"){
            major_2.forEach(item=>{
            h.push('<option value="' + item.v +'">' + item.t + '</option>');
            });
        }else if(major1 =="공과대학"){
            major_3.forEach(item=>{
            h.push('<option value="' + item.v +'">' + item.t + '</option>');
            });
        }else if(major1 =="스마트융합대학"){
            major_4.forEach(item=>{
            h.push('<option value="' + item.v +'">' + item.t + '</option>');
            });
        }else if(major1 =="경상대학"){
            major_5.forEach(item=>{
            h.push('<option value="' + item.v +'">' + item.t + '</option>');
            });
        }else if(major1 =="사회과학대학"){
            major_6.forEach(item=>{
            h.push('<option value="' + item.v +'">' + item.t + '</option>');
            });
        }else if(major1 =="생명나노과학대학"){
            major_7.forEach(item=>{
            h.push('<option value="' + item.v +'">' + item.t + '</option>');
            });
        } else if(major1 =="탈메이지교양.융합대학"){
            major_8.forEach(item=>{
            h.push('<option value="' + item.v +'">' + item.t + '</option>');
            });
        } else if(major1 =="아트&디자인테크놀로지대학"){
            major_9.forEach(item=>{
            h.push('<option value="' + item.v +'">' + item.t + '</option>');
            });
        }
    }
    document.getElementById("major2").innerHTML = h.join("");
 
}
loadMajor();