import { jsx, jsxs } from "react/jsx-runtime";
import { Fragment, useState, useEffect } from "react";
import { Disclosure, Transition } from "@headlessui/react";
const Faq = ({ faq }) => {
  return /* @__PURE__ */ jsx(Disclosure, { children: /* @__PURE__ */ jsx(Disclosure.Panel, { static: true, as: Fragment, children: ({ open, close }) => /* @__PURE__ */ jsxs("div", { className: "w-full", children: [
    /* @__PURE__ */ jsx(Disclosure.Button, { as: Fragment, children: /* @__PURE__ */ jsxs("div", { className: `w-full flex items-stretch border-t-2 border-l-2 border-r-2 ${!open ? "border-b-2 rounded-xl" : "rounded-t-xl"} border-indigo-500 overflow-hidden`, children: [
      /* @__PURE__ */ jsxs("div", { className: "flex-grow px-10 py-6 flex items-center gap-10", children: [
        /* @__PURE__ */ jsx("span", { className: "flex-shrink-0", children: faq.number }),
        /* @__PURE__ */ jsx("p", { className: "flex-grow text-base font-semibold tracking-wide", children: faq.question })
      ] }),
      /* @__PURE__ */ jsx("button", { className: "flex-shrink-0 w-20 text-xl font-bold text-white rounded-lg overflow-hidden bg-gradient-to-tr from-sky-400 to-indigo-500", children: open ? /* @__PURE__ */ jsx("span", { children: `-` }) : /* @__PURE__ */ jsx("span", { children: `+` }) })
    ] }) }),
    /* @__PURE__ */ jsx(
      Transition,
      {
        show: open,
        enter: "transition duration-300 ease-out",
        enterFrom: "transform scale-95 opacity-0",
        enterTo: "transform scale-100 opacity-100",
        leave: "transition duration-200 ease-out",
        leaveFrom: "transform scale-100 opacity-100",
        leaveTo: "transform scale-95 opacity-0",
        children: /* @__PURE__ */ jsx("div", { className: `px-16 py-8 border-b-2 border-l-2 border-r-2 ${!open ? " rounded-xl" : "rounded-b-xl"} border-indigo-500 overflow-hidden`, children: /* @__PURE__ */ jsx("p", { className: "text-lg font-normal tracking-wide leading-10", children: faq.answer }) })
      }
    )
  ] }) }) });
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
  }, [locale]);
  return { faqs };
};
const useFaqs$1 = useFaqs;
export {
  Faq as F,
  useFaqs$1 as u
};
