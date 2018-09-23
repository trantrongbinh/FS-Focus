<template>
  <span class="vote-button">
    <a class="claps_button btn-tool">
        <svg class="svgIcon-use" width="33" height="33" viewBox="0 0 33 33" @click="upVote( votableId )">
            <path d="M28.86 17.342l-3.64-6.402c-.292-.433-.712-.729-1.163-.8a1.124 1.124 0 0 0-.889.213c-.63.488-.742 1.181-.33 2.061l1.222 2.587 1.4 2.46c2.234 4.085 1.511 8.007-2.145 11.663-.26.26-.526.49-.797.707 1.42-.084 2.881-.683 4.292-2.094 3.822-3.823 3.565-7.876 2.05-10.395zm-6.252 11.075c3.352-3.35 3.998-6.775 1.978-10.469l-3.378-5.945c-.292-.432-.712-.728-1.163-.8a1.122 1.122 0 0 0-.89.213c-.63.49-.742 1.182-.33 2.061l1.72 3.638a.502.502 0 0 1-.806.568l-8.91-8.91a1.335 1.335 0 0 0-1.887 1.886l5.292 5.292a.5.5 0 0 1-.707.707l-5.292-5.292-1.492-1.492c-.503-.503-1.382-.505-1.887 0a1.337 1.337 0 0 0 0 1.886l1.493 1.492 5.292 5.292a.499.499 0 0 1-.353.854.5.5 0 0 1-.354-.147L5.642 13.96a1.338 1.338 0 0 0-1.887 0 1.338 1.338 0 0 0 0 1.887l2.23 2.228 3.322 3.324a.499.499 0 0 1-.353.853.502.502 0 0 1-.354-.146l-3.323-3.324a1.333 1.333 0 0 0-1.886 0 1.325 1.325 0 0 0-.39.943c0 .356.138.691.39.943l6.396 6.397c3.528 3.53 8.86 5.313 12.821 1.353zM12.73 9.26l5.68 5.68-.49-1.037c-.518-1.107-.426-2.13.224-2.89l-3.303-3.304a1.337 1.337 0 0 0-1.886 0 1.326 1.326 0 0 0-.39.944c0 .217.067.42.165.607zm14.787 19.184c-1.599 1.6-3.417 2.392-5.353 2.392-.349 0-.7-.03-1.058-.082a7.922 7.922 0 0 1-3.667.887c-3.049 0-6.115-1.626-8.359-3.87l-6.396-6.397A2.315 2.315 0 0 1 2 19.724a2.327 2.327 0 0 1 1.923-2.296l-.875-.875a2.339 2.339 0 0 1 0-3.3 2.33 2.33 0 0 1 1.24-.647l-.139-.139c-.91-.91-.91-2.39 0-3.3.884-.884 2.421-.882 3.301 0l.138.14a2.335 2.335 0 0 1 3.948-1.24l.093.092c.091-.423.291-.828.62-1.157a2.336 2.336 0 0 1 3.3 0l3.384 3.386a2.167 2.167 0 0 1 1.271-.173c.534.086 1.03.354 1.441.765.11-.549.415-1.034.911-1.418a2.12 2.12 0 0 1 1.661-.41c.727.117 1.385.565 1.853 1.262l3.652 6.423c1.704 2.832 2.025 7.377-2.205 11.607zM13.217.484l-1.917.882 2.37 2.837-.454-3.719zm8.487.877l-1.928-.86-.44 3.697 2.368-2.837zM16.5 3.293L15.478-.005h2.044L16.5 3.293z" fill-rule="evenodd"></path>
        </svg>
        <!-- <svg class="svgIcon-use" width="33" height="33" viewBox="0 0 33 33">
            <g fill-rule="evenodd">
                <path d="M29.58 17.1l-3.854-6.78c-.365-.543-.876-.899-1.431-.989a1.491 1.491 0 0 0-1.16.281c-.42.327-.65.736-.7 1.207v.001l3.623 6.367c2.46 4.498 1.67 8.802-2.333 12.807-.265.265-.536.505-.81.728 1.973-.222 3.474-1.286 4.45-2.263 4.166-4.165 3.875-8.6 2.215-11.36zm-4.831.82l-3.581-6.3c-.296-.439-.725-.742-1.183-.815a1.105 1.105 0 0 0-.89.213c-.647.502-.755 1.188-.33 2.098l1.825 3.858a.601.601 0 0 1-.197.747.596.596 0 0 1-.77-.067L10.178 8.21c-.508-.506-1.393-.506-1.901 0a1.335 1.335 0 0 0-.393.95c0 .36.139.698.393.95v.001l5.61 5.61a.599.599 0 1 1-.848.847l-5.606-5.606c-.001 0-.002 0-.003-.002L5.848 9.375a1.349 1.349 0 0 0-1.902 0 1.348 1.348 0 0 0 0 1.901l1.582 1.582 5.61 5.61a.6.6 0 0 1-.848.848l-5.61-5.61c-.51-.508-1.393-.508-1.9 0a1.332 1.332 0 0 0-.394.95c0 .36.139.697.393.952l2.363 2.362c.002.001.002.002.002.003l3.52 3.52a.6.6 0 0 1-.848.847l-3.522-3.523h-.001a1.336 1.336 0 0 0-.95-.393 1.345 1.345 0 0 0-.949 2.295l6.779 6.78c3.715 3.713 9.327 5.598 13.49 1.434 3.527-3.528 4.21-7.13 2.086-11.015zM11.817 7.727c.06-.328.213-.64.466-.893.64-.64 1.755-.64 2.396 0l3.232 3.232c-.82.783-1.09 1.833-.764 2.992l-5.33-5.33z"></path>
                <path d="M13.285.48l-1.916.881 2.37 2.837z"></path>
                <path d="M21.719 1.361L19.79.501l-.44 3.697z"></path>
                <path d="M16.502 3.298L15.481 0h2.043z"></path>
            </g>
        </svg> -->
    </a>
    <br>
  </span>
</template>

<script>
export default {
  props: {
    votableId: {
      	type: String,
		default () {
			return 0
		}
    },
    api: {
      	type: String,
      	default: 'article'
    },
  },
  data() {
    return {
      	isLike: false,
    }
  },
  methods: {
    // toggleStatus() {
    //   	let count = this.item.vote_count

    //   	this.item.is_voting = !this.item.is_voting

    //   	this.item.vote_count = this.item.is_voting ? count + 1 : count - 1
    // },
    upVote(id) {
  		this.toggleVote(id, 'up')
    },
    downVote(id) {
      	this.toggleVote(id, 'down')
    },
    toggleVote(id, type) {
      	let url = this.api + '/vote/' + type
      	// let upType = 'is_up_voted'
      	// let downType = 'is_down_voted'
      	// let checkType = type == 'up' ? downType : upType
      	// let votingType = type == 'up' ? upType : downType

      	this.$http.post(url, { id: id })
        	.then(() => {
          	// 	if (this.item[checkType]) {
           //  		this.item[upType] = !this.item[upType]
           //  		this.item[downType] = !this.item[downType]
           //  		type == 'up' ? this.item.vote_count++ : this.item.vote_count--
          	// 	} else {
           //  		this.item[votingType] = !this.item[votingType]
        			// if (type == 'up') this.item[upType] ? this.item.vote_count++ : this.item.vote_count--
          	// 	}
          		console.log('ok')
        	}).catch((response) => {
        		console.log(response)
          		if (response.status == 401) {
            		window.location = '/login';
          		}
        	})
    	},
  	}
}
</script>

<style lang="scss" scoped>

    @keyframes clap {
        0% {
            opacity: 0;
        }
        60% {
            opacity: 1;
            transform: translateY(-100px) scale(1);
        }
        80% {
            transform: translateY(-190px) scale(0.6);
        }
        100% {
            opacity: 0;
        }
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 0;
        }
        70% {
            box-shadow: 0 0 5px 10px rgba(255, 255, 255, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(255, 255, 255, 0);
        }
    }

    .claps_button {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        border-radius: 50%;
        background-color: #fff;
        border: 1px solid #02b875;
        width: 60px;
        height: 60px;
        outline: 0;
        cursor: pointer;
        filter: drop-shadow(0 3px 12px rgba(0, 0, 0, 0.05));
        transform: scale(1);
        transition: all .1s ease-in;
        z-index: 1;
        fill: #02B875;
        pointer-events: visible;
    }

    a.claps_button {
        border-color: #02b875;
        color: #00ab6b;
        fill: #00ab6b;
        animation: pulse 3s infinite;
        position: absolute;
        margin-left: -23px;
    }

    a.claps_button:hover {
        width: 65px;
        height: 65px;
        border-color: #02b875;
        color: #00ab6b;
        fill: #00ab6b;
        animation: pulse 2s infinite;
    }
</style>