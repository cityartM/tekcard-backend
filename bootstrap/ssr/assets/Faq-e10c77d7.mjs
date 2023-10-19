import { jsxs, jsx } from "react/jsx-runtime";
import { useState, useEffect } from "react";
const Faq = ({ Faq: Faq2 }) => {
  const [isOpen, setIsOpen] = useState(false);
  return /* @__PURE__ */ jsxs("div", { className: "w-full border-2 border-sky-400 rounded-lg overflow-hidden", children: [
    /* @__PURE__ */ jsx(FaqHeader, { faq: Faq2, isOpen, setIsOpen }),
    /* @__PURE__ */ jsx(FaqContent, { faq: Faq2, isOpen })
  ] });
};
const FaqHeader = ({ faq, isOpen, setIsOpen }) => {
  return /* @__PURE__ */ jsxs("div", { className: `w-full flex items-stretch ${isOpen ? "border-b-2 border-sky-400" : ""} `, children: [
    /* @__PURE__ */ jsxs("div", { className: "flex-grow px-10 py-6 flex items-center gap-10", children: [
      /* @__PURE__ */ jsx("span", { className: "flex-shrink-0", children: faq.number }),
      /* @__PURE__ */ jsx("p", { className: "flex-grow text-base font-semibold tracking-wide", children: faq.question })
    ] }),
    /* @__PURE__ */ jsx(FaqExpandButton, { faq, isOpen, setIsOpen })
  ] });
};
const FaqContent = ({ faq, isOpen }) => {
  return /* @__PURE__ */ jsx("div", { className: `${!isOpen ? "hidden" : ""} px-16 py-8`, children: /* @__PURE__ */ jsx("p", { className: "text-lg font-normal tracking-wide leading-10", children: faq.answer }) });
};
const FaqExpandButton = ({ faq, isOpen, setIsOpen }) => {
  return /* @__PURE__ */ jsx("button", { onClick: (e) => setIsOpen(!isOpen), className: "flex-shrink-0 w-20 text-xl font-bold text-white bg-sky-400", children: isOpen ? /* @__PURE__ */ jsx("span", { children: `-` }) : /* @__PURE__ */ jsx("span", { children: `+` }) });
};
const faqData = [
  {
    locale: "en",
    faqs: [
      {
        number: 1,
        question: "What is a digital business card?",
        answer: "Digital business cards are used by both individuals and businesses to quickly and sustainably exchange contact information. They’re more engaging, cost-effective, and eco-friendly than traditional physical business cards. Digital cards are also known as virtual, electronic, and—in some cases—NFC business cards. How do I share my business cards?"
      },
      {
        number: 2,
        question: "How can I make a digital business card for free?",
        answer: "To make a digital business card for free, you can use our platform and follow these simple steps..."
      },
      {
        number: 3,
        question: "How do I share my business cards?",
        answer: "Sharing your digital business cards is easy. You can share them through email, text, or social media..."
      },
      {
        number: 4,
        question: "What is an NFC business card?",
        answer: "An NFC business card is a digital business card that can be exchanged by simply tapping your device to another NFC-enabled device..."
      },
      {
        number: 5,
        question: "What is the benefit of a digital card?",
        answer: "Digital cards offer various benefits, including cost-effectiveness, eco-friendliness, and ease of sharing. They also reduce the need for physical cards..."
      }
    ]
  },
  {
    locale: "ar",
    faqs: [
      {
        number: 1,
        question: "ما هي بطاقة الأعمال الرقمية؟",
        answer: "تُستخدم بطاقات الأعمال الرقمية من قبل الأفراد والشركات لتبادل معلومات الاتصال بسرعة. إنها أكثر إشراكًا وكفاءة من البطاقات الورقية التقليدية وصديقة للبيئة. تُعرف أيضًا بالبطاقات الرقمية الظاهرة والإلكترونية وفي بعض الحالات ببطاقات NFC للأعمال. كيف يمكنني مشاركة بطاقات أعمالي؟"
      },
      {
        number: 2,
        question: "كيف يمكنني إنشاء بطاقة أعمال رقمية مجانية؟",
        answer: "لإنشاء بطاقة أعمال رقمية مجانية، يمكنك استخدام منصتنا واتباع هذه الخطوات البسيطة..."
      },
      {
        number: 3,
        question: "كيف يمكنني مشاركة بطاقات أعمالي؟",
        answer: "مشاركة بطاقات أعمالك الرقمية سهلة. يمكنك مشاركتها عبر البريد الإلكتروني أو الرسائل النصية أو وسائل التواصل الاجتماعي..."
      },
      {
        number: 4,
        question: "ما هي بطاقة الأعمال الرقمية NFC؟",
        answer: "بطاقة الأعمال الرقمية NFC هي بطاقة أعمال رقمية يمكن تبادلها ببساطة عن طريق لمس جهازك بجهاز آخر مزود بتقنية NFC..."
      },
      {
        number: 5,
        question: "ما هي فوائد البطاقة الرقمية؟",
        answer: "تقدم البطاقات الرقمية فوائد متعددة، بما في ذلك الكفاءة من حيث التكلفة وصديقة البيئة وسهولة المشاركة. تقلل أيضًا من الحاجة إلى البطاقات الورقية..."
      }
    ]
  },
  {
    locale: "tr",
    faqs: [
      {
        number: 1,
        question: "Dijital iş kartı nedir?",
        answer: "Dijital iş kartları, hem bireyler hem de işletmeler tarafından iletişim bilgilerini hızlı ve sürdürülebilir bir şekilde değiştirmek için kullanılır..."
      },
      {
        number: 2,
        question: "Nasıl ücretsiz dijital bir iş kartı yapabilirim?",
        answer: "Ücretsiz dijital bir iş kartı oluşturmak için platformumuzu kullanabilir ve bu basit adımları takip edebilirsiniz..."
      },
      {
        number: 3,
        question: "İş kartlarımı nasıl paylaşabilirim?",
        answer: "Dijital iş kartlarınızı paylaşmak çok kolaydır. Bunları e-posta, metin veya sosyal medya aracılığıyla paylaşabilirsiniz..."
      },
      {
        number: 4,
        question: "NFC iş kartı nedir?",
        answer: "NFC iş kartı, cihazınızı başka bir NFC uyumlu cihaza dokunarak kolayca değiş tokuş edebileceğiniz bir dijital iş kartıdır..."
      },
      {
        number: 5,
        question: "Dijital bir kartın faydaları nelerdir?",
        answer: "Dijital kartlar, maliyet etkinlik, çevre dostu olma ve paylaşmanın kolaylığı dahil olmak üzere çeşitli faydalar sunar. Ayrıca fiziksel kartlara duyulan ihtiyaca azaltırlar..."
      }
    ]
  }
];
const fetchFaqs = (locale) => {
  const faqs = faqData.find((item) => item.locale === locale);
  if (faqs) {
    return faqs.faqs;
  } else {
    return [];
  }
};
const useFaqs = (locale) => {
  const [faqs, setFaqs] = useState(null);
  useEffect(() => {
    const data = fetchFaqs(locale);
    setFaqs(data);
    console.log(data);
  }, [locale]);
  return { faqs };
};
export {
  Faq as F,
  useFaqs as u
};
