<style>



.color_picker_dialog p {
    -webkit-user-select: none;
    pointer-events: none;
}

.color_picker_dialog {
    display: inline-block;
    border-radius: 4px;
    background: #3b3e3e;
    position: relative;
    padding: 15px;
    box-sizing: border-box;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    color: white;
   box-shadow: 2px 2px 10px 0 rgba(0, 0, 0, .3);

}

.hue_bar {
    background: -webkit-linear-gradient(top, #ff0000 0%, #ffff00 17%, #00ff00 33%, #00ffff 50%, #0000ff 67%, #ff00ff 83%, #ff0000 100%);
    background: linear-gradient(to bottom, #ff0000 0%, #ffff00 17%, #00ff00 33%, #00ffff 50%, #0000ff 67%, #ff00ff 83%, #ff0000 100%);
    width: 14px;
    height: 100px;
    position: relative;
    display: inline-block;
    cursor: pointer;
}

    .hue_bar .hue_picker {
        position: absolute;
        left: 50%;
        border-radius: 50%;
        top: 0;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        height: 14px;
        width: 14px;
        border: 2px solid white;
        /*pointer-events: none;*/
        cursor: pointer;
        box-shadow: 2px 2px 6px 0 rgba(0, 0, 0, .3);
        background: hsl(0, 100%, 50%);
    }

        .hue_bar .hue_picker.active {
            width: 18px;
            height: 18px;
        }

.sat_rect {
    width: 100px;
    height: 100px;
    display: inline-block;
    margin-left: 8px;
    background: hsl(0, 100%, 50%);
    position: relative;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

    .sat_rect .sat_picker {
        position: absolute;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        width: 12px;
        height: 12px;
        top: 0;
        left: 100%;
        border-radius: 50%;
        border: 2px solid white;
        z-index: 10;
        -webkit-transition: width .25s, height .25s;
        transition: width .25s, height .25s;
        background: hsl(0, 100%, 50%);
        box-shadow: 2px 2px 6px 0 rgba(0, 0, 0, .3);
    }

        .sat_rect .sat_picker.active {
            width: 16px;
            height: 16px;
        }

    .sat_rect .black,
    .sat_rect .white {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }

    .sat_rect .white {
        background: -webkit-linear-gradient(left, #fff, rgba(204, 154, 129, 0));
        background: linear-gradient(to right, #fff, rgba(204, 154, 129, 0));
    }

    .sat_rect .black {
        background: -webkit-linear-gradient(bottom, #000, rgba(204, 154, 129, 0));
        background: linear-gradient(to top, #000, rgba(204, 154, 129, 0));
    }

.bottom {
    display: flex;
    align-items: center;
    margin-top: 8px;
}

.color_preview {
    display: block;
    width: 15px;
    height: 15px;
    border-radius: 2px;
    background: hsl(0, 100%, 50%);
    display: inline-block;
}

.bottom input {
    margin-left: 10px;
    height: 18px;
    font-size: 16px;
    outline: none !important;
    width: 100px;
    border-radius: 2px;
    border: 0;
    padding: 0 4px;
}

.bottom img {
    margin-left: 10px;
    height: 30px;
}
</style>

