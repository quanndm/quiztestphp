<?php
$maBD = $_GET['maBD'];
$de = new DeThi();
$d = $de->getDebyId($maBD);
?>

<div class="card ">
    <div class="card-header d-flex " style="justify-content: space-between;">
        <h4>Kiểm tra</h4>
        <h4><span id="cauhoihientai"></span>/<span><?= $d['soCauHoi'] ?></span></h4>
        <h4>Thời gian: <span class="time"><?php echo $d['thoiGianTest'] ?>:00</span> </h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 d-flex mb-2" style="justify-content: flex-end;">
                <button class="btn btn-primary" id="btnFinish">Nộp bài</button>
                <button class="btn btn-primary" style="display: none;" id="btnBack">Quay lại</button>
            </div>
            <div class="col-12 mb-2 text-center" id="hienthidiem" style="display: none;">
                <h3>Điểm: <span id="score"></span></h3>
                <h3>Số câu đúng: <span id="soCau"></span></h3>
            </div>
        </div>
        <!-- cau hoi -->
        <div class="row question" id="question">
            <div class="col-12">
                <h3 id="title"></h3>
                <ul>
                    <li>
                        <div class="form-check mb-3">
                            <input class="form-check-input cautraloi" type="radio" name="cautraloi" value="a" id="A">
                            <label class="form-check-label fs-5" for="A" id="dapAn_A"></label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check mb-3">
                            <input class="form-check-input cautraloi" type="radio" name="cautraloi" value="b" id="B">
                            <label class="form-check-label fs-5" for="B" id="dapAn_B"></label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check mb-3">
                            <input class="form-check-input cautraloi" type="radio" name="cautraloi" value="c" id="C">
                            <label class="form-check-label fs-5" for="C" id="dapAn_C"></label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check mb-3">
                            <input class="form-check-input cautraloi" type="radio" name="cautraloi" value="d" id="D">
                            <label class="form-check-label fs-5" for="D" id="dapAn_D"></label>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-12 d-flex justify-content-around">
                <!-- <button class="btn btn-primary" id="prev">Câu trước</button> -->
                <button class="btn btn-primary" id="next">Chọn</button>
            </div>
        </div>
        <!-- ket qua -->
        <div class="row">
            <div class="col-12">
                <div id="ketqua"></div>
            </div>
        </div>
    </div>
</div>
<script>
    // khai bao
    const divQuestion = document.getElementById("question");
    const divKetQua = document.getElementById("ketqua");
    const cauhoi = document.getElementById("title");
    const cautraloi = document.querySelectorAll(".cautraloi");
    const dapAn_A = document.getElementById("dapAn_A");
    const dapAn_B = document.getElementById("dapAn_B");
    const dapAn_C = document.getElementById("dapAn_C");
    const dapAn_D = document.getElementById("dapAn_D");
    const btnNext = document.getElementById("next");
    const btnFinish = document.getElementById("btnFinish");
    const cauhoihientai = document.getElementById("cauhoihientai");
    const ketqua = document.getElementById("score");
    const soCauDung = document.getElementById("soCau");
    const btnBack = document.getElementById("btnBack");
    let timeInter;
    let length = 0;
    let All_Answer = [];
    let cauhoi_hientai = 0;
    let diem = 0;
    // hàm lấy dữ liệu từ data
    let array_cauhoi = (async function() {
        const response = await fetch("./api/showCauhoi.php?maBD=<?= $maBD ?>&random=true");
        const res = await response.json();
        return res;
    })();
    //hàm đếm ngược thời gian
    function startTimer(duration, display) {
        var timer = duration,
            minutes, seconds;

        timeInter = setInterval(function() {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                timer = 0;
                handlerBtnFinish();
                alert("Hết giờ");
                clearInterval(timeInter);
            }
        }, 1000);
    }
    //ham lam tron so
    function round(value, precision) {

        if (precision == 0)
            return Math.round(value);

        exp = 1;
        for (i = 0; i < precision; i++)
            exp *= 10;

        return Math.round(value * exp) / exp;
    }
    // hàm render câu hỏi
    function renderQuestion(cauhoi_hientai) {
        btnNext.disabled = true;
        array_cauhoi.then(data => {
            length = data.length;
            const get_cauhoi = data[cauhoi_hientai];
            cauhoi.textContent = get_cauhoi.noiDungCauHoi;
            cauhoi.parentNode.lastElementChild.dataset.id = get_cauhoi.maND;
            dapAn_A.textContent = get_cauhoi.dapAn_A;
            dapAn_B.textContent = get_cauhoi.dapAn_B;
            dapAn_C.textContent = get_cauhoi.dapAn_C;
            dapAn_D.textContent = get_cauhoi.dapAn_D;
        })
    }
    // click button next
    btnNext.addEventListener("click", () => {
        array_cauhoi.then(data => {
            if (cauhoi_hientai <= data.length - 1) {
                const answer = get_answer();
                All_Answer = [...All_Answer, answer];
                if (cauhoi_hientai + 1 === data.length) {
                    cauhoihientai.textContent = data.length
                    btnNext.style.display = "none";
                } else {
                    // tăng số câu hỏi hiện tại
                    cauhoi_hientai++;
                    // hiển thị lại số câu hiện tại
                    cauhoihientai.textContent = cauhoi_hientai;
                    // render lại câu hỏi mới
                    remove_answer()
                    renderQuestion(cauhoi_hientai);
                }
            }
        })
    })
    // ẩn button câu tiếp theo
    cautraloi.forEach((element) => {
        element.addEventListener("change", (event) => {
            btnNext.disabled = false;
        })
    })
    //xóa kết quả đã chọn khi qua câu mới
    function remove_answer() {
        cautraloi.forEach((ans) => {
            ans.checked = false;
        })
    }
    // lấy kết quả
    function get_answer() {
        let answer = {
            id_cauhoi: cauhoi.parentNode.lastElementChild.dataset.id,
            checked: ""
        };
        cautraloi.forEach((ans) => {
            if (ans.checked) {
                answer.checked = ans.id;
            }
        })
        return answer;
    }
    // nộp bài
    function handlerBtnFinish(){
        if (All_Answer.length < length) {
            array_cauhoi.then(data=>{
                let j = All_Answer.length;
                for (let i = j; i < data.length; i++) {
                    let obj = {
                        id_cauhoi: data[i].maND,
                        checked:""
                    }
                    All_Answer.push(obj);
                }
            })
        }

        const obj = {
            "status": "post result",
            "arrayQuestionUser": All_Answer,
            "maBD": <?= $maBD ?>,
            "maHS": '<?= $_SESSION['maHS'] ?>',
            "maMon":'<?=$d['maMon']?>',
            "maLop":<?=$_SESSION['maLop']?>,
            "maGV":<?=$d['maGV']?>,
            "length": length
        }
        $.ajax({
            type: "POST",
            url: "./api/ketQua.php",
            data: {
                mydata: JSON.stringify(obj)
            },
            success: function(json) {
                btnFinish.style.display = "none";
                btnBack.style.display = "block";
                clearInterval(timeInter);
                All_Answer = All_Answer.sort((i, j) => i.id_cauhoi - j.id_cauhoi)
                let data = JSON.parse(json);
                // ẩn câu hỏi
                divQuestion.hidden = true;
                // hiển thị điểm
                document.getElementById("hienthidiem").style.display = "block";
                ketqua.textContent = round(data.diem, 2);
                // Hiển thị số câu đúng
                soCauDung.textContent = data.soCauDung;
                // hiển thị đáp án
                for (let i = 0; i < data.question.length; i++) {
                    if (All_Answer.length !== 0) {
                        for (let j = 0; j < All_Answer.length; j++) {
                            if (data.question[i].maND === All_Answer[j].id_cauhoi) {
                                divKetQua.innerHTML += `
                                    <div>
                                        <h3>${data.question[i].noiDungCauHoi}</h3>
                                        <ul>
                                            <li>
                                                A. ${data.question[i].dapAn_A}
                                            </li>
                                            <li>
                                                B. ${data.question[i].dapAn_B}
                                            </li>
                                            <li>
                                                C. ${data.question[i].dapAn_C}
                                            </li>
                                            <li>
                                                D. ${data.question[i].dapAn_D}
                                            </li>
                                            <li class='fw-bold'>
                                                Bạn chọn: <span class='text-uppercase'>${All_Answer[j].checked}</span></br>
                                                Đáp án đúng: ${data.question[i].ketQua}
                                            </li>
                                        </ul>
                                    </div>
                                `;
                                break;
                            }
                        }
                    } else {
                        divKetQua.innerHTML += `
                            <div>
                                <h3>${data.question[i].noiDungCauHoi}</h3>
                                <ul>
                                    <li>
                                        A. ${data.question[i].dapAn_A}
                                    </li>
                                    <li>
                                        B. ${data.question[i].dapAn_B}
                                    </li>
                                    <li>
                                        C. ${data.question[i].dapAn_C}
                                    </li>
                                    <li>
                                        D. ${data.question[i].dapAn_D}
                                    </li>
                                    <li class='fw-bold'>
                                        Bạn chọn: </br>
                                        Đáp án đúng: ${data.question[i].ketQua}
                                    </li>
                                </ul>
                            </div>
                        `;
                    }
                }
            }
        })
    }
    btnFinish.addEventListener("click", handlerBtnFinish);
    // Quay lại trang chủ
    btnBack.addEventListener("click", ()=>{
        window.location.href= "./index.php?controller=student&action=xemDe";
    })
    window.onload = function() {
        var Minutes = 60 * <?php echo $d['thoiGianTest'] ?>;
        var display = document.querySelector('.time');
        startTimer(Minutes, display);
        //render cau hoi
        renderQuestion(cauhoi_hientai);
        //lấy số câu hỏi đã làm
        cauhoihientai.textContent = cauhoi_hientai;
    };
</script>