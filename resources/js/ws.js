const ws = new WebSocket("ws://0.0.0.0:3000/");

ws.onmessage = (e) => {
    console.log(e);
};

ws.onopen = (event) => {
    console.log(event);
    ws.send('jii')

};
