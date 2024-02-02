
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .backgroud {
        width: 100%;
        height: calc(100vh - 50px); 
        border: 5px solid black;
        background: linear-gradient(#07ad30, #079c2c);
    }

    .game-board {
        width: 100%;
        height: 95%;
        margin: 0 auto;
        position: relative;
        overflow: hidden;
        background: linear-gradient(#68d1e9, #aef6f8);
    }

    .duck {
        width: 80px;
        margin-left: 25px;
        position: absolute;
        bottom: 0;

    }

    .pipe {
        position: absolute;
        bottom: 0;
        width: 80px;
        right: 100%;
        /*animation: animation 1.5s infinite linear;*/
    }

    .clouds {
        width: 150px;
        position: absolute;
        animation: animation 30s infinite linear;
    }

    .score {
        color: white;
        position: absolute;
        right: 5vh;
    }

    .jump {
        animation: jump 600ms ease-out;
    }

    .btn-start {
        min-width: 300px;
        min-height: 60px;
        font-family: 'Nunito', sans-serif;
        font-size: 22px;
        text-transform: uppercase;
        letter-spacing: 1.3px;
        font-weight: 1000;
        color: #313133;
        background: #4FD1C5;
        background: linear-gradient(90deg, rgba(129,230,217,1) 0%, rgba(79,209,197,1) 100%);
        border: none;
        border-radius: 600px;
        box-shadow: 12px 12px 24px rgba(79,209,197,.64);
        transition: all 0.3s ease-in-out 0s;
        cursor: pointer;
        outline: none;
        position: absolute;
        padding: 10px;
        animation: buttonAnimation 10s infinite linear;
        bottom: 50%;
    }
    
    .btn-start::before {
        content: '';
        border-radius: 1000px;
        min-width: calc(300px + 12px);
        min-height: calc(60px + 12px);
        border: 6px solid #00FFCB;
        box-shadow: 0 0 60px rgba(0,255,203,.64);
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0;
        transition: all .3s ease-in-out 0s;
    }
    
    .btn-start:hover, .button:focus {
        color: #313133;
        transform: translateY(-6px);
    }
    
    .btn-start:hover::before, button:focus::before {
        opacity: 1;
    }
    
    .btn-start::after {
        content: '';
        width: 30px; height: 30px;
        border-radius: 100%;
        border: 6px solid #00FFCB;
        position: absolute;
        z-index: -1;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        animation: ring 1s infinite;
    }
    
    .btn-start:hover::after, button:focus::after {
        animation: none;
        display: none;
    }
    
    @keyframes ring {
        0% {
        width: 30px;
        height: 30px;
        opacity: 1;
        }
        100% {
        width: 1000px;
        height: 1000px;
        opacity: 0;
        }
    }

    @keyframes animation {
        from {
            right: -80px;
        }

        to {
            right: 100%;
        }
    }

    @keyframes jump {
        0%{
            bottom: 0;
        }
        40%{
            bottom: 180px;
        }
        50%{
            bottom: 180px;
        }
        60%{
            bottom: 180px;
        }
        70%{
            bottom: 140px;
        }
        80%{
            bottom: 100px;
        }
        90%{
            bottom: 50px;
        }
        100%{
            bottom: 0;
        }
    }

    @keyframes buttonAnimation {
        0% {
            left: 0;
        }
        50% {
            left: calc(100% - 300px);
        }
        100% {
            left: 0;
        }
    }
</style>
@include('site.menu.menu')

<div class="backgroud">
    <div class="game-board">
        <img src="{{ asset('images/clouds.png') }}" class="clouds">
        <img src="{{ asset('images/pipe.png') }}" class="pipe">
        <img src="{{ asset('images/duckrun.gif') }}" class="duck">
        <h1 class="score">00000</h1>
        <button class="btn-start">Start</button>
    </div>
</div>
<script>
    const duck = document.querySelector('.duck')
    const pipe = document.querySelector('.pipe')
    const start = document.querySelector('.btn-start')

    let backup = [
        duck,
        pipe
    ]

    let scoreGame = 0;
    let speed = 1.5;

    const jump = () => {
        duck.classList.add('jump');
        setTimeout(() => {
            duck.classList.remove('jump')
        }, 500);
    }

    const score = (scoreGame) => {
        let score = document.querySelector('.score')
        if(scoreGame > 1){
            if (scoreGame > 10000)
                scoreGame = 'Anti-social avistado!'
            else if(scoreGame < 10000)
                scoreGame = `0000${Math.trunc(scoreGame)}`
            else if(scoreGame < 100)
                scoreGame = `000${Math.trunc(scoreGame)}`
            else if(scoreGame < 1000)
                scoreGame = `00${Math.trunc(scoreGame)}`
            else if(scoreGame < 10000)
                scoreGame = `0${Math.trunc(scoreGame)}`

            score.innerHTML = scoreGame
            speed -= 0.00008

            pipe.style.animation = `animation ${speed}s infinite linear`
        }
    }

    const loop = () => {
        let interval = setInterval(() => {
            
            scoreGame += 0.1
            score(scoreGame)
            const pipePosition = pipe.offsetLeft
            const duckPosition = +window.getComputedStyle(duck).bottom.replace('px', '')

            if(pipePosition <= 120 && pipePosition > 0 && duckPosition < 80){
                pipe.style.animation = 'none'
                pipe.style.left = `${pipePosition}px`

                duck.style.animation = 'none'
                duck.style.width = '75px'
                duck.style.marginLeft = '40px'
                duck.src = '{{ asset('images/duck.png') }}'

                start.style.display = 'block'

                clearInterval(interval);
            }

        }, 10);
    }

    setInterval(() => {
        let score = document.querySelector('.score')
        let color = ['red', 'blue', 'green', 'yellow', 'white']
        score.style.color = `${color[Math.floor(Math.random() * 5)]}`
    }, 200);

    const initGame = () => {
        start.style.display = 'none'

        pipe.style = backup[1].style

        duck.style = backup[0].style
        duck.src = '{{ asset('images/duckrun.gif') }}'

        scoreGame = 0
        speed = 1.5

        loop()
    }

    document.addEventListener('click', jump)
    document.addEventListener('keydown', jump) 
    start.addEventListener('click', initGame)
</script>