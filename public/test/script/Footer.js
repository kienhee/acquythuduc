import { mobileIcon, emailIcon, locationIcon } from "../constant/constants.js";

const contactMethods = [
  {
    content: "Hotline: 0796 39 58 68 - 093 66 97 139",
    icon: mobileIcon
  },
  {
    content: "Email: acquyhoaphat5868q9@gmail.com",
    icon: emailIcon
  },
  {
    content: "Địa chỉ: 828 xa lộ Hà Nội, Phường. Hiệp Phú, TP. Thủ Đức, TP. HCM.",
    icon: locationIcon
  }
]

const renderCrontactMethod = (method) => {
  return `<div class="flex items-start mt-2">
  <span class="w-[2.5rem] laptop:w-[0.75rem] laptop-[0.74rem] mr-1 desktop:w-[1rem] desktop:mt-2 desktop:h-[1rem] tablet:mt-2 tablet:mr-2 h-[2rem] tablet:w-[0.75rem] tablet:h-[0.75rem] flex items-center">
    ${method.icon}
  </span>
  <p class="text-[20px] laptop:text-base inline flex-1 desktop:text-[16px] tablet:text-sm text-white pt-1">
    ${method.content}
  </p>
</div>`
}

const renderContactMethods = () => {
  let render = '';
  contactMethods.forEach(method => {
    render += renderCrontactMethod(method)
  })
  let contactsId = document.getElementById('contacts')
  contactsId.innerHTML = render
}

const categories = [
  'Bình ắc quy GS',
  'Bình ắc quy VARTA',
  'Bình ắc quy SEBANG',
  'Bình ắc quy AMARON',
  'Bình ắc quy DONGNAI',
]

const renderCategoryElement = (category) => {
  return `<p class="text-white text-left desktop:text-lg laptop:text-base text-[20px] tablet:text-sm mb-2">${category}</p>`
}

const renderCategories = () => {
  let render = '';
  categories.forEach(category => {
    render += renderCategoryElement(category)
  })
  let categoriesId = document.getElementById('categories')
  categoriesId.innerHTML = render
}

renderCategories();
renderContactMethods();