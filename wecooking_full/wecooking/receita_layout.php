<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./styles/internal.css">
    <link rel="stylesheet" href="./styles/modal.css">
    <link rel="stylesheet" href="./styles/header.css"> <!-- Header Styles  -->
    <link rel="stylesheet" href="../styles/footer.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>WeCooking | Criar receita</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="./styles/file.css" type="text/css" />
    <script src="https://kit.fontawesome.com/2e6f1b8c97.js" crossorigin="anonymous"></script>
</head>
<style>
    p {
        margin: 0;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    .content {
        .title {
            font-size: 3vh;
            border-bottom: 0.1vh solid orange;
        }

        #form {
            display: flex;
            flex-direction: row;
            width: 100%;
            margin-top: 4vh;

            justify-content: space-between;

            .left {
                display: flex;
                flex-direction: column;

                .container {
                    width: 75%;
                    border-top: 0.1vh solid #c1c1c1;
                    margin-top: 2vh;
                    padding-top: 2vh;

                    display: flex;
                    flex-direction: row;

                    .tempo {
                        display: flex;
                        flex-direction: column;
                        margin-left: auto;

                        .input {
                            width: 11vw;
                            height: 4vh;
                            border: 0.1vh solid #c3c3c3;
                            outline: none;
                            border-radius: 1vh;
                            padding: 0 1vw;
                            font-size: 1.6vh;
                            margin-top: 1vh;
                        }
                    }
                }

                .difContainer {
                    display: flex;
                    flex-direction: column;
                    align-items: flex-start;

                    gap: 1vh;

                    .difRow {
                        display: flex;
                        flex-direction: row;
                        align-items: center;
                        gap: 1vw;

                        #textDif {
                            text-transform: capitalize;
                            height: fit-content;
                        }
                    }

                    .dificuldade {
                        display: flex;
                        flex-direction: row;
                        gap: 1vw;

                        .btnDif {
                            cursor: pointer;
                            border: 0.1vh solid #c3c3c3;
                            border-radius: 4vh;

                            height: 4vh;
                            width: 4vh;

                            display: flex;
                            justify-content: center;
                            align-items: center;
                        }

                        .btnDif svg {
                            height: 2vh;
                            width: 2vh;
                        }

                        .difSelected {
                            border-color: orange;
                        }

                        .difSelected svg path {
                            fill: orange;
                        }
                    }
                }

                .difContainer span {
                    color: transparent;
                    user-select: none;
                }
            }

            .right {
                display: flex;
                flex-direction: column;
                width: 60%;
                align-items: center;

                .textArea {
                    width: 25vw;
                    height: 9vh;
                    border: 0.1vh solid #c3c3c3;
                    outline: none;
                    border-radius: 1vh;
                    padding: 1vh 1vw;
                    font-size: 1.6vh;
                    resize: none;

                    font-family: 'Poppins', sans-serif;
                }

                .infoText {
                    font-size: 1.6vh;
                    margin-top: 0.5vh;

                }

                .input {
                    width: 25vw;
                    height: 4vh;
                    border: 0.1vh solid #c3c3c3;
                    outline: none;
                    border-radius: 1vh;
                    padding: 0 1vw;
                    font-size: 1.6vh;
                }

                .ingredientes,
                .modo-preparo {
                    display: flex;
                    flex-direction: column;
                    gap: 1vh;


                    .ingrInput {
                        display: flex;
                        flex-direction: row;
                        justify-content: flex-end;

                        .fa-xmark {
                            cursor: pointer;
                            position: absolute;
                            font-size: 2.6vh;
                            align-self: center;
                            margin-right: 0.6vw;
                        }
                    }
                }

                .add-ingr {
                    padding: 1vh 2.5vw;
                    border-radius: 2vh;
                    border: 0.1vh solid #EFEFEF;
                    outline: none;
                    font-size: 1.6vh;
                    color: #fff;
                    font-weight: 700;
                    font-family: "Poppins", sans-serif;
                    background-color: #F78C2F;
                    text-align: center;
                    cursor: pointer;
                    z-index: 2;

                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-self: center;
                }

                .extras {
                    margin-top: 2vh;
                    display: flex;
                    flex-direction: column;
                    width: 100%;
                    align-items: center;

                    .cobertura,
                    .recheio {
                        width: 30%;
                        display: flex;
                        flex-direction: column;
                        align-items: center;

                        .inputTag {
                            visibility: hidden;
                            position: absolute;
                        }

                        .tag {
                            display: flex;
                            flex-direction: row;
                            align-items: center;
                            user-select: none;
                            width: 100%;
                            justify-content: space-between;

                            .check {
                                height: 1.5vh;
                                width: 1.5vh;
                                border: 0.1vh solid #000;
                                cursor: pointer;
                            }

                            .checked {
                                background-color: #F78C2F;
                            }
                        }
                    }

                    .cobertura-ingrs,
                    .recheio-ingrs {
                        display: flex;
                        flex-direction: column;
                        border-bottom: 0.1vh solid #c3c3c3;
                        margin-bottom: 2vh;

                        .ingredientes-cobertura,
                        .ingredientes-recheio,
                        .modo-preparo-cobertura,
                        .modo-preparo-recheio {
                            display: flex;
                            flex-direction: column;
                            gap: 1vh;

                            .ingrInput {
                                display: flex;
                                flex-direction: row;
                                justify-content: flex-end;

                                .fa-xmark {
                                    cursor: pointer;
                                    position: absolute;
                                    font-size: 2.6vh;
                                    align-self: center;
                                    margin-right: 0.6vw;
                                }
                            }
                        }

                        .add-ingr {
                            padding: 1vh 2.5vw;
                            border-radius: 2vh;
                            margin-bottom: 2vh;

                            border: 0.1vh solid #EFEFEF;
                            outline: none;
                            font-size: 1.6vh;
                            color: #fff;
                            font-weight: 700;
                            font-family: "Poppins", sans-serif;
                            background-color: #F78C2F;
                            text-align: center;
                            cursor: pointer;
                            z-index: 2;

                            display: flex;
                            flex-direction: column;
                            justify-content: center;
                            align-self: center;
                        }
                    }

                    .hide {
                        position: absolute;
                        opacity: 0;
                        z-index: -1;
                        transform: scale(0);
                    }
                }

                #submit {
                    padding: 1vh 2.5vw;
                    border-radius: 2vh;
                    border: none;
                    outline: none;
                    font-size: 1.6vh;
                    text-transform: uppercase;
                    color: #fff;
                    font-weight: 700;
                    font-family: "Poppins", sans-serif;
                    background-color: #F78C2F;
                    text-align: center;
                    cursor: pointer;
                    z-index: 2;

                    display: flex;
                    flex-direction: row;
                    justify-content: center;
                    align-items: center;
                }
            }

            .right label {
                margin-bottom: 2vh;
            }
        }
    }

    .tags {
        width: 70%;
        margin-top: 2vh;
        gap: 1vh;

        .tagsRow {
            display: grid;
            grid-template-columns: auto auto auto;

            margin-top: 2vh;

            .inputTag {
                visibility: hidden;
                position: absolute;
            }

            .tag {
                display: flex;
                flex-direction: row;
                align-items: center;
                gap: 0.5vw;
                user-select: none;

                .check {
                    height: 1.5vh;
                    width: 1.5vh;
                    border: 0.1vh solid #000;
                    cursor: pointer;
                }

                .checked {
                    background-color: #F78C2F;
                }
            }

        }
    }

    .footer {
        margin-top: 10vh;
    }
</style>

<body>
    <div class="screen">
        <div class="content" style="margin-top: 5vh">
            <div class="title" id="title">Criar receita</div>
            <form id="form">
                <div class="left">
                    <div id="fileUploader" class="dropzone" name="fileUploader">
                        <div class="dz-message">
                            <i class="fa-regular fa-image" id="imageUpload"></i>
                            <div class="imageText">Clique aqui para adicionar uma imagem (Máx. 3)</div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="difContainer">
                            <label for="dificuldade">Dificuldade*</label>
                            <div class="difRow">
                                <div class="dificuldade" id="">
                                    <div id="fácil" class="btnDif">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                            viewBox="0 0 21 21" fill="none" class="hat">
                                            <path
                                                d="M3.82846 13.3041H4.52613C4.52606 13.1684 4.48643 13.0357 4.41208 12.9222C4.33773 12.8087 4.23189 12.7193 4.10753 12.665L3.82846 13.3041ZM16.8517 13.3041L16.5726 12.665C16.4483 12.7193 16.3424 12.8087 16.2681 12.9222C16.1937 13.0357 16.1541 13.1684 16.154 13.3041H16.8517ZM13.8285 6.24923C13.8285 6.43426 13.902 6.61172 14.0328 6.74256C14.1636 6.8734 14.3411 6.9469 14.5261 6.9469C14.7112 6.9469 14.8886 6.8734 15.0195 6.74256C15.1503 6.61172 15.2238 6.43426 15.2238 6.24923H13.8285ZM5.45637 6.24923C5.45637 6.43426 5.52987 6.61172 5.66071 6.74256C5.79155 6.8734 5.96901 6.9469 6.15404 6.9469C6.33908 6.9469 6.51653 6.8734 6.64737 6.74256C6.77821 6.61172 6.85172 6.43426 6.85172 6.24923H5.45637ZM5.68893 3.69109C4.27033 3.69109 2.90983 4.25462 1.90673 5.25773C0.903624 6.26083 0.340088 7.62132 0.340088 9.03992H1.73544C1.73544 7.99139 2.15196 6.98581 2.89339 6.24439C3.63481 5.50296 4.64039 5.08644 5.68893 5.08644V3.69109ZM14.9913 5.08644C16.0398 5.08644 17.0454 5.50296 17.7868 6.24439C18.5282 6.98581 18.9447 7.99139 18.9447 9.03992H20.3401C20.3401 7.62132 19.7766 6.26083 18.7735 5.25773C17.7703 4.25462 16.4099 3.69109 14.9913 3.69109V5.08644ZM13.1308 19.505H7.54939V20.9004H13.1308V19.505ZM7.54939 19.505C6.65265 19.505 6.04986 19.5032 5.60055 19.4427C5.17172 19.385 4.98753 19.2855 4.8666 19.1636L3.88055 20.1516C4.30381 20.5748 4.83125 20.7469 5.41544 20.826C5.97916 20.9022 6.69172 20.9004 7.54939 20.9004V19.505ZM3.13079 16.4818C3.13079 17.3395 3.12893 18.052 3.2052 18.6157C3.28334 19.1999 3.45637 19.7274 3.87962 20.1506L4.8666 19.1646C4.74567 19.0436 4.64613 18.8595 4.58753 18.4297C4.528 17.9813 4.52613 17.3785 4.52613 16.4818H3.13079ZM16.154 16.4818C16.154 17.3785 16.1522 17.9813 16.0917 18.4306C16.034 18.8595 15.9345 19.0436 15.8126 19.1646L16.8006 20.1506C17.2238 19.7274 17.3959 19.1999 17.475 18.6157C17.5513 18.052 17.5494 17.3395 17.5494 16.4818H16.154ZM13.1308 20.9004C13.9885 20.9004 14.701 20.9022 15.2647 20.826C15.8489 20.7478 16.3773 20.5748 16.8006 20.1506L15.8136 19.1646C15.6926 19.2855 15.5085 19.385 15.0787 19.4436C14.6303 19.5032 14.0275 19.505 13.1308 19.505V20.9004ZM5.68893 5.08644C5.888 5.08644 6.08241 5.10132 6.27311 5.12923L6.47683 3.74876C6.21596 3.71028 5.95262 3.69101 5.68893 3.69109V5.08644ZM10.3401 0.900391C9.31941 0.900392 8.32437 1.22006 7.49467 1.81452C6.66497 2.40897 6.04228 3.24835 5.71404 4.21481L7.03497 4.66318C7.26954 3.97277 7.71446 3.37316 8.30724 2.94855C8.90003 2.52394 9.61092 2.29565 10.3401 2.29574V0.900391ZM5.71404 4.21481C5.5429 4.7203 5.45586 5.25044 5.45637 5.78411H6.85172C6.85172 5.39062 6.91683 5.01388 7.0359 4.66318L5.71404 4.21481ZM14.9913 3.69109C14.7243 3.69109 14.461 3.71062 14.2033 3.74876L14.408 5.12923C14.6011 5.10072 14.796 5.08642 14.9913 5.08644V3.69109ZM10.3401 2.29574C11.0691 2.29585 11.7798 2.52423 12.3724 2.94882C12.965 3.37342 13.4098 3.97292 13.6443 4.66318L14.9652 4.21481C14.637 3.2485 14.0145 2.40923 13.185 1.81479C12.3554 1.22035 11.3606 0.900586 10.3401 0.900391V2.29574ZM13.6443 4.66318C13.7633 5.01388 13.8285 5.39062 13.8285 5.78411H15.2238C15.2238 5.2362 15.1326 4.70876 14.9652 4.21481L13.6452 4.66318H13.6443ZM4.52613 16.4818V13.3041H3.13079V16.4818H4.52613ZM4.10753 12.665C3.4023 12.3571 2.80224 11.8501 2.38089 11.2062C1.95954 10.5623 1.73523 9.80944 1.73544 9.03992H0.340088C0.340019 10.0808 0.643609 11.0991 1.21365 11.9701C1.7837 12.841 2.59544 13.5267 3.54939 13.9432L4.10753 12.665ZM16.154 13.3041V16.4818H17.5494V13.3041H16.154ZM18.9447 9.03992C18.9449 9.80944 18.7206 10.5623 18.2993 11.2062C17.8779 11.8501 17.2779 12.3571 16.5726 12.665L17.1308 13.9432C18.0847 13.5267 18.8965 12.841 19.4665 11.9701C20.0366 11.0991 20.3402 10.0808 20.3401 9.03992H18.9447ZM13.8285 5.78411V6.24923H15.2238V5.78411H13.8285ZM5.45637 5.78411V6.24923H6.85172V5.78411H5.45637Z"
                                                fill="#DBDBDB" />
                                        </svg>
                                    </div>
                                    <div id="médio" class="btnDif">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                            viewBox="0 0 21 21" fill="none" class="hat">
                                            <path
                                                d="M3.82846 13.3041H4.52613C4.52606 13.1684 4.48643 13.0357 4.41208 12.9222C4.33773 12.8087 4.23189 12.7193 4.10753 12.665L3.82846 13.3041ZM16.8517 13.3041L16.5726 12.665C16.4483 12.7193 16.3424 12.8087 16.2681 12.9222C16.1937 13.0357 16.1541 13.1684 16.154 13.3041H16.8517ZM13.8285 6.24923C13.8285 6.43426 13.902 6.61172 14.0328 6.74256C14.1636 6.8734 14.3411 6.9469 14.5261 6.9469C14.7112 6.9469 14.8886 6.8734 15.0195 6.74256C15.1503 6.61172 15.2238 6.43426 15.2238 6.24923H13.8285ZM5.45637 6.24923C5.45637 6.43426 5.52987 6.61172 5.66071 6.74256C5.79155 6.8734 5.96901 6.9469 6.15404 6.9469C6.33908 6.9469 6.51653 6.8734 6.64737 6.74256C6.77821 6.61172 6.85172 6.43426 6.85172 6.24923H5.45637ZM5.68893 3.69109C4.27033 3.69109 2.90983 4.25462 1.90673 5.25773C0.903624 6.26083 0.340088 7.62132 0.340088 9.03992H1.73544C1.73544 7.99139 2.15196 6.98581 2.89339 6.24439C3.63481 5.50296 4.64039 5.08644 5.68893 5.08644V3.69109ZM14.9913 5.08644C16.0398 5.08644 17.0454 5.50296 17.7868 6.24439C18.5282 6.98581 18.9447 7.99139 18.9447 9.03992H20.3401C20.3401 7.62132 19.7766 6.26083 18.7735 5.25773C17.7703 4.25462 16.4099 3.69109 14.9913 3.69109V5.08644ZM13.1308 19.505H7.54939V20.9004H13.1308V19.505ZM7.54939 19.505C6.65265 19.505 6.04986 19.5032 5.60055 19.4427C5.17172 19.385 4.98753 19.2855 4.8666 19.1636L3.88055 20.1516C4.30381 20.5748 4.83125 20.7469 5.41544 20.826C5.97916 20.9022 6.69172 20.9004 7.54939 20.9004V19.505ZM3.13079 16.4818C3.13079 17.3395 3.12893 18.052 3.2052 18.6157C3.28334 19.1999 3.45637 19.7274 3.87962 20.1506L4.8666 19.1646C4.74567 19.0436 4.64613 18.8595 4.58753 18.4297C4.528 17.9813 4.52613 17.3785 4.52613 16.4818H3.13079ZM16.154 16.4818C16.154 17.3785 16.1522 17.9813 16.0917 18.4306C16.034 18.8595 15.9345 19.0436 15.8126 19.1646L16.8006 20.1506C17.2238 19.7274 17.3959 19.1999 17.475 18.6157C17.5513 18.052 17.5494 17.3395 17.5494 16.4818H16.154ZM13.1308 20.9004C13.9885 20.9004 14.701 20.9022 15.2647 20.826C15.8489 20.7478 16.3773 20.5748 16.8006 20.1506L15.8136 19.1646C15.6926 19.2855 15.5085 19.385 15.0787 19.4436C14.6303 19.5032 14.0275 19.505 13.1308 19.505V20.9004ZM5.68893 5.08644C5.888 5.08644 6.08241 5.10132 6.27311 5.12923L6.47683 3.74876C6.21596 3.71028 5.95262 3.69101 5.68893 3.69109V5.08644ZM10.3401 0.900391C9.31941 0.900392 8.32437 1.22006 7.49467 1.81452C6.66497 2.40897 6.04228 3.24835 5.71404 4.21481L7.03497 4.66318C7.26954 3.97277 7.71446 3.37316 8.30724 2.94855C8.90003 2.52394 9.61092 2.29565 10.3401 2.29574V0.900391ZM5.71404 4.21481C5.5429 4.7203 5.45586 5.25044 5.45637 5.78411H6.85172C6.85172 5.39062 6.91683 5.01388 7.0359 4.66318L5.71404 4.21481ZM14.9913 3.69109C14.7243 3.69109 14.461 3.71062 14.2033 3.74876L14.408 5.12923C14.6011 5.10072 14.796 5.08642 14.9913 5.08644V3.69109ZM10.3401 2.29574C11.0691 2.29585 11.7798 2.52423 12.3724 2.94882C12.965 3.37342 13.4098 3.97292 13.6443 4.66318L14.9652 4.21481C14.637 3.2485 14.0145 2.40923 13.185 1.81479C12.3554 1.22035 11.3606 0.900586 10.3401 0.900391V2.29574ZM13.6443 4.66318C13.7633 5.01388 13.8285 5.39062 13.8285 5.78411H15.2238C15.2238 5.2362 15.1326 4.70876 14.9652 4.21481L13.6452 4.66318H13.6443ZM4.52613 16.4818V13.3041H3.13079V16.4818H4.52613ZM4.10753 12.665C3.4023 12.3571 2.80224 11.8501 2.38089 11.2062C1.95954 10.5623 1.73523 9.80944 1.73544 9.03992H0.340088C0.340019 10.0808 0.643609 11.0991 1.21365 11.9701C1.7837 12.841 2.59544 13.5267 3.54939 13.9432L4.10753 12.665ZM16.154 13.3041V16.4818H17.5494V13.3041H16.154ZM18.9447 9.03992C18.9449 9.80944 18.7206 10.5623 18.2993 11.2062C17.8779 11.8501 17.2779 12.3571 16.5726 12.665L17.1308 13.9432C18.0847 13.5267 18.8965 12.841 19.4665 11.9701C20.0366 11.0991 20.3402 10.0808 20.3401 9.03992H18.9447ZM13.8285 5.78411V6.24923H15.2238V5.78411H13.8285ZM5.45637 5.78411V6.24923H6.85172V5.78411H5.45637Z"
                                                fill="#DBDBDB" />
                                        </svg>
                                    </div>
                                    <div id="difícil" class="btnDif">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                            viewBox="0 0 21 21" fill="none" class="hat">
                                            <path
                                                d="M3.82846 13.3041H4.52613C4.52606 13.1684 4.48643 13.0357 4.41208 12.9222C4.33773 12.8087 4.23189 12.7193 4.10753 12.665L3.82846 13.3041ZM16.8517 13.3041L16.5726 12.665C16.4483 12.7193 16.3424 12.8087 16.2681 12.9222C16.1937 13.0357 16.1541 13.1684 16.154 13.3041H16.8517ZM13.8285 6.24923C13.8285 6.43426 13.902 6.61172 14.0328 6.74256C14.1636 6.8734 14.3411 6.9469 14.5261 6.9469C14.7112 6.9469 14.8886 6.8734 15.0195 6.74256C15.1503 6.61172 15.2238 6.43426 15.2238 6.24923H13.8285ZM5.45637 6.24923C5.45637 6.43426 5.52987 6.61172 5.66071 6.74256C5.79155 6.8734 5.96901 6.9469 6.15404 6.9469C6.33908 6.9469 6.51653 6.8734 6.64737 6.74256C6.77821 6.61172 6.85172 6.43426 6.85172 6.24923H5.45637ZM5.68893 3.69109C4.27033 3.69109 2.90983 4.25462 1.90673 5.25773C0.903624 6.26083 0.340088 7.62132 0.340088 9.03992H1.73544C1.73544 7.99139 2.15196 6.98581 2.89339 6.24439C3.63481 5.50296 4.64039 5.08644 5.68893 5.08644V3.69109ZM14.9913 5.08644C16.0398 5.08644 17.0454 5.50296 17.7868 6.24439C18.5282 6.98581 18.9447 7.99139 18.9447 9.03992H20.3401C20.3401 7.62132 19.7766 6.26083 18.7735 5.25773C17.7703 4.25462 16.4099 3.69109 14.9913 3.69109V5.08644ZM13.1308 19.505H7.54939V20.9004H13.1308V19.505ZM7.54939 19.505C6.65265 19.505 6.04986 19.5032 5.60055 19.4427C5.17172 19.385 4.98753 19.2855 4.8666 19.1636L3.88055 20.1516C4.30381 20.5748 4.83125 20.7469 5.41544 20.826C5.97916 20.9022 6.69172 20.9004 7.54939 20.9004V19.505ZM3.13079 16.4818C3.13079 17.3395 3.12893 18.052 3.2052 18.6157C3.28334 19.1999 3.45637 19.7274 3.87962 20.1506L4.8666 19.1646C4.74567 19.0436 4.64613 18.8595 4.58753 18.4297C4.528 17.9813 4.52613 17.3785 4.52613 16.4818H3.13079ZM16.154 16.4818C16.154 17.3785 16.1522 17.9813 16.0917 18.4306C16.034 18.8595 15.9345 19.0436 15.8126 19.1646L16.8006 20.1506C17.2238 19.7274 17.3959 19.1999 17.475 18.6157C17.5513 18.052 17.5494 17.3395 17.5494 16.4818H16.154ZM13.1308 20.9004C13.9885 20.9004 14.701 20.9022 15.2647 20.826C15.8489 20.7478 16.3773 20.5748 16.8006 20.1506L15.8136 19.1646C15.6926 19.2855 15.5085 19.385 15.0787 19.4436C14.6303 19.5032 14.0275 19.505 13.1308 19.505V20.9004ZM5.68893 5.08644C5.888 5.08644 6.08241 5.10132 6.27311 5.12923L6.47683 3.74876C6.21596 3.71028 5.95262 3.69101 5.68893 3.69109V5.08644ZM10.3401 0.900391C9.31941 0.900392 8.32437 1.22006 7.49467 1.81452C6.66497 2.40897 6.04228 3.24835 5.71404 4.21481L7.03497 4.66318C7.26954 3.97277 7.71446 3.37316 8.30724 2.94855C8.90003 2.52394 9.61092 2.29565 10.3401 2.29574V0.900391ZM5.71404 4.21481C5.5429 4.7203 5.45586 5.25044 5.45637 5.78411H6.85172C6.85172 5.39062 6.91683 5.01388 7.0359 4.66318L5.71404 4.21481ZM14.9913 3.69109C14.7243 3.69109 14.461 3.71062 14.2033 3.74876L14.408 5.12923C14.6011 5.10072 14.796 5.08642 14.9913 5.08644V3.69109ZM10.3401 2.29574C11.0691 2.29585 11.7798 2.52423 12.3724 2.94882C12.965 3.37342 13.4098 3.97292 13.6443 4.66318L14.9652 4.21481C14.637 3.2485 14.0145 2.40923 13.185 1.81479C12.3554 1.22035 11.3606 0.900586 10.3401 0.900391V2.29574ZM13.6443 4.66318C13.7633 5.01388 13.8285 5.39062 13.8285 5.78411H15.2238C15.2238 5.2362 15.1326 4.70876 14.9652 4.21481L13.6452 4.66318H13.6443ZM4.52613 16.4818V13.3041H3.13079V16.4818H4.52613ZM4.10753 12.665C3.4023 12.3571 2.80224 11.8501 2.38089 11.2062C1.95954 10.5623 1.73523 9.80944 1.73544 9.03992H0.340088C0.340019 10.0808 0.643609 11.0991 1.21365 11.9701C1.7837 12.841 2.59544 13.5267 3.54939 13.9432L4.10753 12.665ZM16.154 13.3041V16.4818H17.5494V13.3041H16.154ZM18.9447 9.03992C18.9449 9.80944 18.7206 10.5623 18.2993 11.2062C17.8779 11.8501 17.2779 12.3571 16.5726 12.665L17.1308 13.9432C18.0847 13.5267 18.8965 12.841 19.4665 11.9701C20.0366 11.0991 20.3402 10.0808 20.3401 9.03992H18.9447ZM13.8285 5.78411V6.24923H15.2238V5.78411H13.8285ZM5.45637 5.78411V6.24923H6.85172V5.78411H5.45637Z"
                                                fill="#DBDBDB" />
                                        </svg>
                                    </div>
                                </div>
                                <div id="textDif"><span>----</span></div>
                            </div>
                        </div>
                        <div class="tempo">
                            <label for="tempo-preparo">Tempo de preparo*</label>
                            <input type="number" name="tempo-preparo" placeholder="Tempo de preparo (Minutos):"
                                class="input">
                        </div>
                    </div>
                    <div class="tags">
                        <label>Tags*</label>
                        <div class="tagsRow">

                            <span class="bolo">
                                <input type="checkbox" value="bolo" class="inputTag" id="bolo">
                                <label class="tag" for="bolo">
                                    <div class="check"></div>
                                    <span>Bolo</span>
                                </label>
                            </span>
                            <span class="torta">
                                <input type="checkbox" value="torta" class="inputTag" id="torta">
                                <label class="tag" for="torta">
                                    <div class="check"></div>
                                    <span>Torta</span>
                                </label>
                            </span>

                            <span class="laranja">
                                <input type="checkbox" value="laranja" class="inputTag" id="laranja">
                                <label class="tag" for="laranja">
                                    <div class="check"></div>
                                    <span>Laranja</span>
                                </label>
                            </span>
                            <span class="chocolate">
                                <input type="checkbox" value="chocolate" class="inputTag" id="chocolate">
                                <label class="tag" for="chocolate">
                                    <div class="check"></div>
                                    <span>Chocolate</span>
                                </label>
                            </span>

                            <span class="cenoura">
                                <input type="checkbox" value="cenoura" class="inputTag" id="cenoura">
                                <label class="tag" for="cenoura">
                                    <div class="check"></div>
                                    <span>Cenoura</span>
                                </label>
                            </span>
                            <span class="banana">
                                <input type="checkbox" value="banana" class="inputTag" id="banana">
                                <label class="tag" for="banana">
                                    <div class="check"></div>
                                    <span>Banana</span>
                                </label>
                            </span>
                            <span class="morango">
                                <input type="checkbox" value="morango" class="inputTag" id="morango">
                                <label class="tag" for="morango">
                                    <div class="check"></div>
                                    <span>Morango</span>
                                </label>
                            </span>
                            <span class="limao">
                                <input type="checkbox" value="limao" class="inputTag" id="limao">
                                <label class="tag" for="limao">
                                    <div class="check"></div>
                                    <span>Limão</span>
                                </label>
                            </span>
                            <span class="milho">
                                <input type="checkbox" value="milho" class="inputTag" id="milho">
                                <label class="tag" for="milho">
                                    <div class="check"></div>
                                    <span>Milho</span>
                                </label>
                            </span>
                            <span class="maca">
                                <input type="checkbox" value="maca" class="inputTag" id="maca">
                                <label class="tag" for="maca">
                                    <div class="check"></div>
                                    <span>Maçã</span>
                                </label>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <label for="name">Título da receita*</label>
                    <input type="text" name="nome" placeholder="Nome da receita:" class="input">
                    <label for="ingredientes" style="margin-top: 2vh">Ingredientes*</label>
                    <div class="ingredientes">
                        <input name="ingrediente1" placeholder="Ingrediente 1" class="input">
                        <input name="ingrediente2" placeholder="Ingrediente 2" class="input">
                        <input name="ingrediente3" placeholder="Ingrediente 3" class="input">
                    </div>
                    <div class="add-ingr" style="margin-top: 2vh" id="add-ingr">Adicionar ingrediente</div>
                    <label for="modo-preparo" style="margin-top: 2vh">Modo de preparo*</label>
                    <div class="modo-preparo">
                        <input name="passo1" placeholder="Passo 1" class="input">
                        <input name="passo2" placeholder="Passo 2" class="input">
                        <input name="passo3" placeholder="Passo 3" class="input">
                    </div>
                    <div class="add-ingr" style="margin-top: 2vh" id="add-passo">Adicionar passo</div>
                    <div class="extras">
                        <span class="cobertura">
                            <input type="checkbox" value="não" class="inputTag" id="cobertura">
                            <label class="tag" for="cobertura">
                                <span>Possui cobertura?</span>
                                <div class="check"></div>
                            </label>
                        </span>
                        <div class="cobertura-ingrs hide">
                            <label for="ingredientes-cobertura">Ingredientes da cobertura*</label>
                            <div class="ingredientes-cobertura">
                                <input name="ingrediente-cober1" placeholder="Ingrediente 1" class="input">
                                <input name="ingrediente-cober2" placeholder="Ingrediente 2" class="input">
                                <input name="ingrediente-cober3" placeholder="Ingrediente 3" class="input">
                            </div>
                            <div class="add-ingr" style="margin-top: 2vh" id="add-cober">Adicionar ingrediente</div>
                            <label for="modo-preparo-cobertura" style="margin-top: 2vh">Modo de preparo da
                                cobertura*</label>
                            <div class="modo-preparo-cobertura">
                                <input name="passo-cobertura1" placeholder="Passo 1" class="input">
                                <input name="passo-cobertura2" placeholder="Passo 2" class="input">
                                <input name="passo-cobertura3" placeholder="Passo 3" class="input">
                            </div>
                            <div class="add-ingr" style="margin-top: 2vh" id="add-passo-cobertura">Adicionar passo</div>
                        </div>
                        <span class="recheio">
                            <input type="checkbox" value="não" class="inputTag" id="recheio">
                            <label class="tag" for="recheio">
                                <span>Possui recheio?</span>
                                <div class="check"></div>
                            </label>
                        </span>
                        <div class="recheio-ingrs hide">
                            <label for="ingredientes-recheio">Ingredientes do recheio*</label>
                            <div class="ingredientes-recheio">
                                <input name="ingrediente-rech1" placeholder="Ingrediente 1" class="input">
                                <input name="ingrediente-rech2" placeholder="Ingrediente 2" class="input">
                                <input name="ingrediente-rech3" placeholder="Ingrediente 3" class="input">
                            </div>
                            <div class="add-ingr" style="margin-top: 2vh" id="add-rech">Adicionar ingrediente</div>
                            <label for="modo-preparo-recheio" style="margin-top: 2vh">Modo de preparo do
                                recheio*</label>
                            <div class="modo-preparo-recheio">
                                <input name="passo-recheio1" placeholder="Passo 1" class="input">
                                <input name="passo-recheio2" placeholder="Passo 2" class="input">
                                <input name="passo-recheio3" placeholder="Passo 3" class="input">
                            </div>
                            <div class="add-ingr" style="margin-top: 2vh" id="add-passo-recheio">Adicionar passo</div>
                        </div>
                    </div>
                    <button id="submit">Salvar</button>
                </div>
            </form>
        </div>
        <button id="scroll_btn">
            <i class="fa-solid fa-arrow-up"></i>
        </button>
    </div>
</body>
<script type="text/javascript" src="./js/header.js">// Header</script>
<script type="text/javascript" src="./js/footer.js">// Footer</script>
<script type="text/javascript" src="./js/menu_perfil.js">// Menu</script>
<script type="text/javascript" src="./js/verify_session.js">// Verifica o cookie</script>
<script type="text/javascript" src="./js/logout.js">// Botão de Logout</script>
<script>
    let typeOfAccess = '';

    $("document").ready(function () {
        if (window.location.hash) {
            typeOfAccess = window.location.hash

            if (typeOfAccess === '#admin') {

            } else if (typeOfAccess === '#user') {
                $("#title").text('Enviar sua receita')
                $(".tags").remove()
                $("#add-ingr").remove()
                $("#add-passo").remove()
                $(".extras").remove()
                $("#submit").css("margin-top", "4vh")

                $(".ingredientes").before("<textarea id='textIngr' class='textArea' placeholder='Insira aqui os ingredientes'></textarea><span class='infoText'>Informe todos os ingredientes e a quantidade presente na receita</span>")
                $(".modo-preparo").before("<textarea id='textModo' class='textArea' placeholder='Insira aqui os passos do modo de preparo'></textarea><span class='infoText'>Informe todos os passos do modo de preparo da receita</span>")

                $(".ingredientes").remove()
                $(".modo-preparo").remove()
            }
        } else {
            location.href = "https://wecooking.online"
        }

        const cookies = document.cookie.split(" ");
        const cookieUser = cookies.find((element) => element.includes("User"));

        if (cookieUser) {
        } else {
            $(".screen").append("<div class='modal-warning'></div>")

            $(".modal-warning").append("<div class='modal-message'></div>")

            $(".modal-message").append("<span class='modal-title'>Deseja nos enviar sua receita?</span>")
            $(".modal-message").append("<span>Faça o login para poder sugerir uma receita.</span>")
            $(".modal-message").append("<div class='modal-links'></div>")

            $(".modal-links").append("<a href='https://wecooking.online/login.php'>Fazer login</a>")
            $(".modal-links").append("<span id='modalNo'>Não, obrigado</span>")

            $("#modalNo").on("click", function () {
                $(".modal-warning").remove();
                location.href = "https://wecooking.online"
            })
        }
    })

    //--------------------------------------------------------------

    let journey_id = null;

    // Extras (Cobertura, Recheio)
    $("#cobertura").on('click', function () {
        $(".cobertura-ingrs").toggleClass("hide")
        $("#cobertura").attr("value", function (index, attr) {
            return attr == 'não' ? 'sim' : 'não';
        })
    })
    $("#recheio").on('click', function () {
        $(".recheio-ingrs").toggleClass("hide")
        $("#recheio").attr("value", function (index, attr) {
            return attr == 'não' ? 'sim' : 'não';
        })
    })

    // Tags
    $(".inputTag").on('click', function (e) {
        $("." + e.currentTarget.id).find("div").toggleClass("checked")
    })

    // Dificuldade----------------------------------------------------------------------
    $(".btnDif").on('click', function (e) {
        $("#textDif").html('<p>' + e.currentTarget.id + '</p>')
        $(".btnDif").removeClass("difSelected")
        $("#" + e.currentTarget.id).toggleClass("difSelected")
        $(".dificuldade").attr("id", e.currentTarget.id)
    })
    $(".btnDif").mouseover(function (e) {
        if ($(".btnDif").hasClass("difSelected")) {
            $("#textDif").text(e.currentTarget.id)
        } else {
            $("#textDif").text(e.currentTarget.id)
        }
    })
    $(".btnDif").mouseout(function (e) {
        if ($(".btnDif").hasClass("difSelected")) {
            $("#textDif").html('<p>' + $(".difSelected").attr("id") + '</p>')
        } else {
            $("#textDif").html('<span>----</span>')
        }
    })

    // Scroll--------------------------------------------------------------------------
    $(window).scroll(function () {
        if ($(window).scrollTop() > 200) {
            $('#scroll_btn').css("visibility", "visible")
        } else {
            $('#scroll_btn').css("visibility", "")
        }
    });

    $('#scroll_btn').on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, '300');
    });

    //-------------------------------------------------------------------------------

    // Formulário
    $("form#form").submit(function (e) {
        if (typeOfAccess === "#admin") {
            e.preventDefault();

            if ($("[name=nome]").val() === '') { // Verifica se há um nome
                alert('Preencha o nome da receita!')
            }
            else if ($("[name=ingrediente1]").val() === '') { // Verifica se o 1 ingrediente foi adicionado
                alert('Preencha pelo menos 1 ingrediente!')
            }
            else if ($("[name=passo1]").val() === '') { // Verifica se o 1 passo foi adicionado
                alert('Preencha pelo menos 1 passo do modo de preparo!')
            }
            else if ($("[name=tempo-preparo]").val() === '') { // Verifica se foi inserido tempo de preparo
                alert('Preencha o tempo de preparo!')
            }
            else if ($(".dificuldade").attr('id') === '') { // Verifica se foi selecionada uma dificuldade
                alert('Selecione a dificuldade da receita!')
            }
            else if ($('.tags').find('input[type=checkbox]:checked').length < 2) { // Verifica se pelo menos 2 tags foram selecionadas
                alert('Selecione pelo menos 2 tags que se encaixem na receita!')
            }
            else if (myDropzone.files.length === 0) {
                alert('Adicione pelo menos 1 imagem!')
            }

            else {
                let tagsSelected = [];
                var formData = new FormData(this); // Pega os dados do form
                formData.append('id', journey_id);
                formData.append('ingredientes', $(".ingredientes").children().length)
                formData.append('passos-preparo', $(".modo-preparo").children().length)

                formData.append('ingredientes-recheio', $(".ingredientes-recheio").children().length)
                formData.append('passos-recheio', $(".modo-preparo-recheio").children().length)

                formData.append('ingredientes-cobertura', $(".ingredientes-cobertura").children().length)
                formData.append('passos-cobertura', $(".modo-preparo-cobertura").children().length)

                formData.append('dificuldade', $(".dificuldade").attr('id'))

                let checkedInputs = $('.tags').find('input[type=checkbox]:checked');
                let numCheckedInputs = checkedInputs.length;

                for (i = 0; i < numCheckedInputs; i++) {
                    let tagSelected = checkedInputs[i].value
                    tagsSelected.push(tagSelected)
                }

                //formData.append('numTags', numCheckedInputs);
                formData.append('tagsSelected', tagsSelected)

                formData.append('cobertura', $("#cobertura").attr('value'))
                formData.append('recheio', $("#recheio").attr('value'))

                $.ajax({
                    url: './php/save_receipt_data.php',
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        journey_id = response.split('</html>')[1].split('*')[1];
                        myDropzone.processQueue();
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }
        } else if (typeOfAccess === "#user") {
            e.preventDefault();

            if ($("[name=nome]").val() === '') { // Verifica se há um nome
                alert('Preencha o nome da receita!')
            }
            else if ($("#textIngr").val() === '') { // Verifica se o 1 ingrediente foi adicionado
                alert('Preencha os ingredientes!')
            }
            else if ($("#textModo").val() === '') { // Verifica se o 2 ingrediente foi adicionado
                alert('Preencha os modos de preparo!')
            }
            else if ($("[name=tempo-preparo]").val() === '') { // Verifica se foi inserido tempo de preparo
                alert('Preencha o tempo de preparo!')
            }
            else if ($(".dificuldade").attr('id') === '') { // Verifica se foi selecionada uma dificuldade
                alert('Selecione a dificuldade da receita!')
            }
            else if (myDropzone.files.length === 0) {
                alert('Adicione pelo menos 1 imagem!')
            }

            else {
                var formData = new FormData(this); // Pega os dados do form
                formData.append('id', journey_id);
                formData.append('ingredientes', $("#textIngr").val())
                formData.append('modo-preparo', $("#textModo").val())
                formData.append('dificuldade', $(".dificuldade").attr('id'))

                $.ajax({
                    url: './php/save_receipt_data_user.php',
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        journey_id = response.split('</html>')[1].split('*')[1];
                        myDropzone.processQueue();
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }
        }
    });

    let myDropzone = new Dropzone("div#fileUploader", {
        url: "./php/upload_images.php",
        paramName: 'files',
        uploadMultiple: true,
        addRemoveLinks: true,
        autoProcessQueue: false,
        acceptedFiles: ".jpeg, .jpg, .png", // Allowed extensions
        dictDefaultMessage: "Selecionar arquivos...",
        dictCancelUpload: "",
        dictRemoveFile: "",
        parallelUploads: 100,
        maxFiles: 3,
        init: function () {
            var myDropzone = this;

            this.on('sending', function (file, xhr, formData) {
                formData.append('id', journey_id);
                formData.append('access', typeOfAccess)
            });

            this.on('success', function () {
                var idData = journey_id

                if (typeOfAccess === "#admin") {
                    $.ajax({
                        type: 'POST',
                        url: './php/create_file_receipt.php',
                        data: { id: idData },
                        cache: false,
                        success: function () {
                            window.location = 'https://wecooking.online'
                        },
                    });
                } else if (typeOfAccess === "#user") {
                    $.ajax({
                        type: 'POST',
                        url: './php/create_file_receipt_user.php',
                        data: { id: idData },
                        cache: false,
                        success: function () {
                            alert('Receita enviada. Ela será revisada por um de nossos administradores e caso não haja nenhum problema, será adicionada ao site.')
                            window.location = 'https://wecooking.online'
                        },
                    });
                }
            })
            // Called when a file is added to the queue
            // Receives `file`
            this.on("addedfile", file => {
                if (myDropzone.files.length >= 0) {
                    $("#imageUpload").css("visibility", "hidden");
                    $(".imageText").text("Clique aqui para adicionar outra imagem (Máx. 3)")
                }
                $(".msg-aviso").addClass("hide-msg");
                $(".dz-default").css("border", "");
                // Inicio configuração de botão para remover arquivo
                if (this.options.addRemoveLinks) {
                    file._removeLink = Dropzone.createElement(
                        `<i class="fa-solid fa-xmark x-mark" href="javascript:undefined;" data-dz-remove></i>`
                    );
                    file.previewElement.appendChild(file._removeLink);
                }
                let removeFileEvent = (e) => {
                    $("#fileUploader").find(".dz-button").text((myDropzone.files.length - 1) + " arquivos selecionados");
                    if ((myDropzone.files.length - 1) === 0) {
                        warning = 0;
                        $("#fileUploader").find(".dz-button").text("Selecionar arquivos...");
                        $("#imageUpload").css("visibility", "visible");
                        $(".imageText").text("Clique aqui para adicionar uma imagem (Máx. 3)")
                    }
                    //$.ajax({
                    //    url: "./php/deleteFiles.php",
                    //    type: 'POST',
                    //    data: { nome: file.name, id: journey_id, step: "step-3", acao: "single" },
                    //});
                    //console.log(file.name);
                    e.preventDefault();
                    e.stopPropagation();
                    if (file.status === Dropzone.UPLOADING) {
                        return Dropzone.confirm(
                            this.options.dictCancelUploadConfirmation,
                            () => this.removeFile(file)
                        );
                    } else {
                        if (this.options.dictRemoveFileConfirmation) {
                            return Dropzone.confirm(
                                this.options.dictRemoveFileConfirmation,
                                () => this.removeFile(file)
                            );
                        } else {
                            return this.removeFile(file);
                        }
                    }
                };
                for (let removeLink of file.previewElement.querySelectorAll("[data-dz-remove]")) {
                    removeLink.addEventListener("click", removeFileEvent);
                }
                // Fim configuração de botão para remover arquivo
            });
            this.on("error", function (file) {
                this.removeFile(file);
            });
        },
    });

    // Adicionar ingrediente ----------------------------------------------------------------------
    $("#add-ingr").on('click', function () {
        let numIngrs = $(".ingredientes").children().length
        let ingrAtual = numIngrs + 1

        $('<div></div>', { class: 'ingrInput ingr-' + ingrAtual, }).appendTo(".ingredientes");

        $('<input>', {
            name: 'ingrediente' + ingrAtual,
            placeholder: 'Ingrediente ' + (numIngrs + 1),
            class: 'input',
            maxlength: "255",
        }).appendTo('.ingr-' + ingrAtual);

        $('<i></i>', {
            class: "fa-solid fa-xmark",
            id: ingrAtual,
        }).appendTo('.ingr-' + ingrAtual);

        $(".fa-xmark").click(function (e) {
            $(".ingr-" + e.currentTarget.id).remove()
            $("i#" + (ingrAtual - 1)).css({ "opacity": "1", "z-index": "1" });
        })

        $("i#" + (ingrAtual - 1)).css({ "opacity": "0", "z-index": "-1" });
    });

    $("#add-passo").on('click', function () {
        let numPassos = $(".modo-preparo").children().length
        let passoAtual = numPassos + 1

        $('<div></div>', { class: 'ingrInput passo-' + passoAtual, }).appendTo(".modo-preparo");

        $('<input>', {
            name: 'passo' + passoAtual,
            placeholder: 'Passo ' + (numPassos + 1),
            class: 'input',
            maxlength: "255",
        }).appendTo('.passo-' + passoAtual);

        $('<i></i>', {
            class: "fa-solid fa-xmark",
            id: 'passo-' + passoAtual,
        }).appendTo('.passo-' + passoAtual);

        $(".fa-xmark").click(function (e) {
            $("." + e.currentTarget.id).remove()
            $("i#passo-" + (passoAtual - 1)).css({ "opacity": "1", "z-index": "1" });
        })

        $("i#passo-" + (passoAtual - 1)).css({ "opacity": "0", "z-index": "-1" });
    });
    //-------------------------------------------------------------------------------------------

    $("#add-cober").on('click', function () {
        let numIngrs = $(".ingredientes-cobertura").children().length
        let ingrAtual = numIngrs + 1

        $('<div></div>', { class: 'ingrInput ingr-cober-' + ingrAtual, }).appendTo(".ingredientes-cobertura");

        $('<input>', {
            name: 'ingrediente-cober' + ingrAtual,
            placeholder: 'Ingrediente ' + (numIngrs + 1),
            class: 'input',
            maxlength: "255",
        }).appendTo('.ingr-cober-' + ingrAtual);

        $('<i></i>', {
            class: "fa-solid fa-xmark",
            id: 'cober-' + ingrAtual,
        }).appendTo('.ingr-cober-' + ingrAtual);

        $(".fa-xmark").click(function (e) {
            $(".ingr-" + e.currentTarget.id).remove()
            $("i#cober-" + (ingrAtual - 1)).css({ "opacity": "1", "z-index": "1" });
        })

        $("i#cober-" + (ingrAtual - 1)).css({ "opacity": "0", "z-index": "-1" });

    });

    $("#add-passo-cobertura").on('click', function () {
        let numPassos = $(".modo-preparo-cobertura").children().length
        let passoAtual = numPassos + 1

        $('<div></div>', { class: 'ingrInput passo-cober' + passoAtual, }).appendTo(".modo-preparo-cobertura");

        $('<input>', {
            name: 'passo-cobertura' + passoAtual,
            placeholder: 'Passo ' + (numPassos + 1),
            class: 'input',
            maxlength: "255",
        }).appendTo('.passo-cober' + passoAtual);

        $('<i></i>', {
            class: "fa-solid fa-xmark",
            id: 'passo-cober' + passoAtual,
        }).appendTo('.passo-cober' + passoAtual);

        $(".fa-xmark").click(function (e) {
            $("." + e.currentTarget.id).remove()
            $("i#passo-cober" + (passoAtual - 1)).css({ "opacity": "1", "z-index": "1" });
        })

        $("i#passo-cober" + (passoAtual - 1)).css({ "opacity": "0", "z-index": "-1" });
    });
    //-------------------------------------------------------------------------------------------

    $("#add-rech").on('click', function () {
        let numIngrs = $(".ingredientes-recheio").children().length
        let ingrAtual = numIngrs + 1

        $('<div></div>', { class: 'ingrInput ingr-rech-' + ingrAtual, }).appendTo(".ingredientes-recheio");

        $('<input>', {
            name: 'ingrediente-rech' + ingrAtual,
            placeholder: 'Ingrediente ' + (numIngrs + 1),
            class: 'input',
            maxlength: "255",
        }).appendTo('.ingr-rech-' + ingrAtual);

        $('<i></i>', {
            class: "fa-solid fa-xmark",
            id: 'rech-' + ingrAtual,
        }).appendTo('.ingr-rech-' + ingrAtual);

        $(".fa-xmark").click(function (e) {
            $(".ingr-" + e.currentTarget.id).remove()
            $("i#rech-" + (ingrAtual - 1)).css({ "opacity": "1", "z-index": "1" });
        })

        $("i#rech-" + (ingrAtual - 1)).css({ "opacity": "0", "z-index": "-1" });

    });

    $("#add-passo-recheio").on('click', function () {
        let numPassos = $(".modo-preparo-recheio").children().length
        let passoAtual = numPassos + 1

        $('<div></div>', { class: 'ingrInput passo-rech' + passoAtual, }).appendTo(".modo-preparo-recheio");

        $('<input>', {
            name: 'passo-recheio' + passoAtual,
            placeholder: 'Passo ' + (numPassos + 1),
            class: 'input',
            maxlength: "255",
        }).appendTo('.passo-rech' + passoAtual);

        $('<i></i>', {
            class: "fa-solid fa-xmark",
            id: 'passo-rech' + passoAtual,
        }).appendTo('.passo-rech' + passoAtual);

        $(".fa-xmark").click(function (e) {
            $("." + e.currentTarget.id).remove()
            $("i#passo-rech" + (passoAtual - 1)).css({ "opacity": "1", "z-index": "1" });
        })

        $("i#passo-rech" + (passoAtual - 1)).css({ "opacity": "0", "z-index": "-1" });
    });
    //-------------------------------------------------------------------------------------------

</script>

</html>