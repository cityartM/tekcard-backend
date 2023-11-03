import React, { PropsWithChildren } from 'react';
import {Head} from '@inertiajs/react';
import LandingLayout from "../Layouts/LandingLayout";
import ContactForm from "../Components/ContactForm";

export default function ContactUs({}: PropsWithChildren) {
  return (
    <LandingLayout className={'bg-gradient-to-tr from-pink-100 to-white'}>
      <Head title="Welcome"/>

      <div className={'mx-auto max-w-7xl'}>

        <div className={'py-28 space-y-20'}>
          {/*Page Header*/}
          <div className={'flex items-center justify-center'}>
            <h1 className={'text-center text-[4rem] text-[#2273AF] font-bold leading-snug'}>
              {'Contact Us'}
            </h1>
          </div>

          <div className={'grid grid-cols-1 md:grid-cols-2 gap-12 items-start'}>
            {/*Header column*/}
            <div className={'space-y-16 md:py-20 px-8 lg:px-16'}>
              <div className={'space-y-6'}>
                <h2 className={'text-[2.5rem] text-[#2273AF] font-bold leading-snug'}>
                  {'Is Tekcard the right platform for your community?'}
                </h2>
                <p className={'text-[1.375rem] text-[#2273AF] font-normal leading-snug tracking-wide'}>
                  {'Just answer a few questions so that we can personalize the right experience for you.'}
                </p>
              </div>

              <div className={'px-8 divide-y devide-[#CFCFCF] bg-white rounded-3xl shadow-2xl'}>
                <div className={'py-6'}>
                  <div className={'flex items-center gap-10'}>
                    <div className={'flex-grow flex items-center gap-6'}>
                      <svg className={'w-16 h-16'} viewBox="0 0 83 84" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect y="0.5" width="83" height="83" rx="20" fill="#478DCB"/>
                        <path
                          d="M18 36.5L40.5 45.1207L63 36.5V51.5C63 57.0228 58.5228 61.5 53 61.5H28C22.4772 61.5 18 57.0228 18 51.5V36.5Z"
                          fill="#44C8EF"/>
                        <path
                          d="M18 33.5C18 27.9772 22.4772 23.5 28 23.5H53C58.5228 23.5 63 27.9772 63 33.5V33.8636L40.5 42.5L18 33.8636V33.5Z"
                          fill="white"/>
                      </svg>
                      <p className={'text-xl font-bold text-[#2273AF]'}>{'Mail Us'}</p>
                    </div>
                    <p className={'flex-shrink-0 text-lg font-semibold text-gray-600'}>{'Techcard@mail.com'}</p>
                  </div>
                </div>
                <div className={'py-6'}>
                  <div className={'flex items-center gap-10'}>
                    <div className={'flex-grow flex items-center gap-6'}>
                      <svg className={'w-16 h-16'} viewBox="0 0 83 84" fill="none">
                        <rect y="0.5" width="83" height="83" rx="20" fill="#44C8EF"/>
                        <path
                          d="M21.0699 31.5158C21.0839 31.5944 21.0952 31.673 21.0999 31.7523C21.1592 32.7695 21.9282 40.8854 31.5962 50.7673C31.5962 50.7673 39.9477 59.2782 48.7374 61.0676C48.7754 61.0755 48.8128 61.084 48.8508 61.0945C49.383 61.2392 53.9075 62.3828 56.2398 60.0439L59.5626 56.7807C59.5926 56.7512 59.6239 56.7224 59.6559 56.6949C59.9874 56.41 62.295 54.278 59.9867 52.0111C57.6504 49.7167 54.7052 46.9192 54.3717 46.6022C54.3557 46.5871 54.3404 46.5721 54.3251 46.5563C54.1443 46.3716 52.4276 44.7106 50.4168 46.2282C50.3587 46.2721 50.304 46.3212 50.252 46.3723L46.9987 49.5758C46.2697 50.2668 45.1119 50.2577 44.3936 49.5555L33.2789 38.6821C32.5326 37.9517 32.552 36.759 33.3216 36.0523L35.9227 33.6655C35.9227 33.6655 38.7726 31.0744 35.712 28.2756L31.1687 23.8138C31.1407 23.7863 31.114 23.7581 31.0874 23.7287C30.7939 23.4038 28.6163 21.1794 26.0613 23.6553C25.9832 23.7306 25.8985 23.7987 25.8085 23.859C24.9415 24.4433 20.3849 27.7077 21.0699 31.5158Z"
                          fill="white"/>
                        <path
                          d="M51.6928 39.4644C52.3964 39.4641 52.9758 38.8905 52.8762 38.1939C52.7531 37.3338 52.5058 36.4938 52.1402 35.7006C51.5962 34.5206 50.8032 33.4724 49.8156 32.628C48.828 31.7836 47.6693 31.163 46.4191 30.809C45.5788 30.571 44.7105 30.4573 43.8417 30.4693C43.1381 30.4791 42.6615 31.1406 42.7705 31.8358C42.8795 32.531 43.5348 32.9929 44.2378 33.0224C44.7397 33.0435 45.2387 33.1232 45.7248 33.2608C46.621 33.5146 47.4516 33.9595 48.1596 34.5648C48.8676 35.1701 49.4361 35.9215 49.826 36.7674C50.0375 37.2262 50.1938 37.7069 50.2926 38.1993C50.431 38.8892 50.9891 39.4648 51.6928 39.4644Z"
                          fill="white"/>
                        <path
                          d="M56.9542 39.609C57.8018 39.6753 58.552 39.0404 58.5203 38.1908C58.4627 36.6455 58.1367 35.118 57.5531 33.6776C56.7762 31.7602 55.5642 30.0498 54.0128 28.6814C52.4613 27.3129 50.6129 26.324 48.6136 25.7926C47.1116 25.3935 45.5553 25.2608 44.0149 25.3966C43.168 25.4712 42.6318 26.2948 42.8034 27.1275C42.9751 27.9602 43.7906 28.4837 44.6396 28.4384C45.7082 28.3814 46.7824 28.4917 47.8228 28.7682C49.3608 29.1769 50.7827 29.9377 51.9762 30.9903C53.1696 32.043 54.102 33.3588 54.6996 34.8337C55.1038 35.8314 55.3474 36.8835 55.4242 37.9509C55.4853 38.7989 56.1066 39.5426 56.9542 39.609Z"
                          fill="white"/>
                      </svg>
                      <p className={'text-xl font-bold text-[#2273AF]'}>{'Call Us'}</p>
                    </div>
                    <p className={'flex-shrink-0 text-lg font-semibold text-gray-600'}>{'(012)345-6789'}</p>
                  </div>
                </div>
              </div>
            </div>
            {/*Form column*/}
            <div className={'col-span-full md:col-span-1 py-20 px-8 lg:px-16 bg-white rounded-3xl'}>
              <ContactForm></ContactForm>
            </div>
          </div>
        </div>

      </div>

    </LandingLayout>
  );
}

