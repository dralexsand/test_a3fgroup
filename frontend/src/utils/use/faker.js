class MyFaker {
  
  randomIntFromInterval(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min)
  }
  
  generate(length) {
    let result = [];
    let item = '';
    
    for (let i = 0; i < length; i++) {
      item = this.generateWord()
      result.push(item)
    }
    
    return result;
  }
  
  generateWord() {
    let chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    let charLength = chars.length;
    let result = '';
    
    let length = this.randomIntFromInterval(10, 20)
    
    for (let i = 0; i < length; i++) {
      result += chars.charAt(Math.floor(Math.random() * charLength));
    }
    
    return result;
  }
  
}

const myfaker = new MyFaker()

export default myfaker
