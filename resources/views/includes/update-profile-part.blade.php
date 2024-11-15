<style>

.main-header{
  font-size:30px;
}
.radio-input {
  display: flex;
  flex-direction: row;
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  font-size: 16px;
  font-weight: 600;
  color: white;
}

.radio-input input[type="radio"] {
  display: none;
}

.radio-input label {
  display: flex;
  align-items: center;
  padding: 10px;
  border: 1px solid #ccc;
  background-color: #212121;
  border-radius: 5px;
  margin-right: 12px;
  cursor: pointer;
  position: relative;
  transition: all 0.3s ease-in-out;
}

.radio-input label:before {
  content: "";
  display: block;
  position: absolute;
  top: 50%;
  left: 0;
  transform: translate(-50%, -50%);
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background-color: #fff;
  border: 2px solid #ccc;
  transition: all 0.3s ease-in-out;
}

.radio-input input[type="radio"]:checked + label:before {
  background-color: green;
  top: 0;
}

.radio-input input[type="radio"]:checked + label {
  background-color: #156345;
  color: #fff;
border-color: black;
  animation: radio-translate 0.5s ease-in-out;
}

@keyframes radio-translate {
  0% {
    transform: translateX(0);
  }

  50% {
    transform: translateY(-10px);
  }

  100% {
    transform: translateX(0);
  }
}
.ui-date {
  --input-bg: #156345;
  --input-padding: 15px 20px;
  --input-hover-bg: rgb(51, 51, 51);
  --input-transition: .3s;
  --input-shadow-color: rgba(0, 0, 0, 0.137);
  --input-shadow: 0 2px 10px 0 var(--input-shadow-color);
  --input-focus-color: #27a776;
  --default-input-color: #fff;
  --font-size: 16px;
  --font-weight: 600;
  --font-family: Menlo, Roboto Mono, monospace;

  box-sizing: border-box;
  padding: var(--input-padding);
  color: var(--default-input-color);
  font: var(--font-weight) var(--font-size) var(--font-family);
  background: var(--input-bg);
  border: none;
  cursor: pointer;
  transition: var(--input-transition);
  box-shadow: var(--input-shadow);
}

.ui-date:hover, .ui-date:focus {
  background: var(--input-hover-bg);
  color: var(--input-focus-color);
}

/* Styles for webkit browsers to customize the date input appearance */
.ui-date::-webkit-calendar-picker-indicator {
  background-color: var(--default-input-color);
  padding: 5px;
  cursor: pointer;
  border-radius: 3px;
}

/* Remove the default outline on focus */
.ui-date:focus {
  outline: none;
}



</style>
