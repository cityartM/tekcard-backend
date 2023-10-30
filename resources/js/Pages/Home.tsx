import React, {PropsWithChildren, SVGProps} from 'react';
import {Head, usePage} from '@inertiajs/react';
import LandingLayout from './../Layouts/LandingLayout';
import {Faq} from '@/Components/Faqs/Faq';
import useFaqs from '../Utils/Faq';
import {FaqType} from '@/types/faq';
import useReviews from '../Utils/Review';
import {DummySponsorIcon} from '@/Components/Icons';

import Background from '../../images/2-phones-rotated.png';
import AppstoreImage from '../../images/appstore1.png';
import PlaystoreImage from '../../images/playstore1.png';
import HeroImage from '../../images/hero.png';

import ImageIphone16 from '@/../images/home/iphone16.png';
import ImageIphone14 from '@/../images/home/iphone14.png';

import {ReviewType} from "@/types/review";

type TSVGElementProps = SVGProps<SVGSVGElement>
const grids = [
  {
    title: "Safe & Security",
    content: "Easily integrate with all your need favorite tools through and APIsing including automatic",
    color: "#32ACED",
    icon: ({className, ...props}: TSVGElementProps) => (
      <svg className={className} {...props} viewBox="0 0 86 89">
        <path d="M12.484 45.3178C17.7742 43.3572 22.6316 40.2261 26.6729 36.1715C28.6426 34.2049 30.9949 32.6718 33.5566 31.6848C36.1183 30.6979 38.8243 30.2822 41.4754 30.4685" strokeWidth="3" strokeLinecap="round" strokeLinejoin="round"/>
        <path d="M40.061 48.854C33.1431 55.7899 24.6248 60.9009 15.3123 63.7033" strokeWidth="3" strokeLinecap="round" strokeLinejoin="round"/>
        <path d="M32.6044 42.1681C34.3944 40.3781 36.8188 39.3692 39.3442 39.3632C41.8697 39.3573 44.2894 40.3548 46.071 42.1364C47.8526 43.918 48.8501 46.3377 48.8442 48.8632C48.8382 51.3886 47.8293 53.813 46.0393 55.603C39.0959 62.5741 30.6955 67.9198 21.4471 71.2526" strokeWidth="3" strokeLinecap="round" strokeLinejoin="round"/>
        <path d="M46.7175 79.5525C51.3241 76.4337 55.6252 72.8836 59.562 68.9507C64.8919 63.6207 67.9033 56.4088 67.9336 48.9013C67.964 41.3939 65.0107 34.2061 59.7236 28.919C54.4365 23.6318 47.2487 20.6786 39.7412 20.7089C32.2338 20.7393 25.0219 23.7506 19.6919 29.0806C17.4151 31.3693 14.7622 33.2493 11.8509 34.6374" strokeWidth="3" strokeLinecap="round" strokeLinejoin="round"/>
        <path d="M25.2113 48.1469C21.0592 50.9495 16.5242 53.0977 11.7763 54.5108" strokeWidth="3" strokeLinecap="round" strokeLinejoin="round"/>
        <path d="M51.2719 34.815C51.8592 35.2707 52.4182 35.7609 52.9463 36.2833C56.2803 39.6172 58.0871 44.2053 57.9692 49.0381C57.8514 53.871 55.8185 58.5527 52.3178 62.0534C50.1097 64.2578 47.7745 66.3307 45.3253 68.2602" strokeWidth="3" strokeLinecap="round" strokeLinejoin="round"/>
        <path d="M37.9395 73.6026C36.3012 74.825 34.6351 76.0197 32.9898 77.1381" strokeWidth="3" strokeLinecap="round" strokeLinejoin="round"/>
      </svg>
    ),
  },
  {
    title: "Individuals account",
    content: "Easily integrate with all your need favorite tools through and APIsing including automatic",
    color: "#EFA346",
    icon: ({className, ...props}: TSVGElementProps) => (
      <svg className={className} {...props} viewBox="0 0 42 66">
        <path d="M2 6.77021L2 59.2317C2 61.8657 4.12665 64.001 6.75 64.001L35.25 64.001C37.8733 64.001 40 61.8657 40 59.2317L40 6.77021C40 4.13624 37.8734 2.00098 35.25 2.00098L6.75 2.00098C4.12665 2.00098 2.00001 4.13623 2 6.77021Z" strokeWidth="4" strokeLinecap="round" strokeLinejoin="round"/>
        <path d="M30 54.001L11 54.001" strokeWidth="4" strokeLinecap="round" strokeLinejoin="round"/>
      </svg>
    ),
  },
  {
    title: "Safe & Security",
    content: "Easily integrate with all your need favorite tools through and APIsing including automatic",
    color: "#2bd866",
    icon: ({className, ...props}: TSVGElementProps) => (
      <svg className={className} {...props} viewBox="0 0 86 89">
        <path d="M12.484 45.3178C17.7742 43.3572 22.6316 40.2261 26.6729 36.1715C28.6426 34.2049 30.9949 32.6718 33.5566 31.6848C36.1183 30.6979 38.8243 30.2822 41.4754 30.4685" strokeWidth="3" strokeLinecap="round" strokeLinejoin="round"/>
        <path d="M40.061 48.854C33.1431 55.7899 24.6248 60.9009 15.3123 63.7033" strokeWidth="3" strokeLinecap="round" strokeLinejoin="round"/>
        <path d="M32.6044 42.1681C34.3944 40.3781 36.8188 39.3692 39.3442 39.3632C41.8697 39.3573 44.2894 40.3548 46.071 42.1364C47.8526 43.918 48.8501 46.3377 48.8442 48.8632C48.8382 51.3886 47.8293 53.813 46.0393 55.603C39.0959 62.5741 30.6955 67.9198 21.4471 71.2526" strokeWidth="3" strokeLinecap="round" strokeLinejoin="round"/>
        <path d="M46.7175 79.5525C51.3241 76.4337 55.6252 72.8836 59.562 68.9507C64.8919 63.6207 67.9033 56.4088 67.9336 48.9013C67.964 41.3939 65.0107 34.2061 59.7236 28.919C54.4365 23.6318 47.2487 20.6786 39.7412 20.7089C32.2338 20.7393 25.0219 23.7506 19.6919 29.0806C17.4151 31.3693 14.7622 33.2493 11.8509 34.6374" strokeWidth="3" strokeLinecap="round" strokeLinejoin="round"/>
        <path d="M25.2113 48.1469C21.0592 50.9495 16.5242 53.0977 11.7763 54.5108" strokeWidth="3" strokeLinecap="round" strokeLinejoin="round"/>
        <path d="M51.2719 34.815C51.8592 35.2707 52.4182 35.7609 52.9463 36.2833C56.2803 39.6172 58.0871 44.2053 57.9692 49.0381C57.8514 53.871 55.8185 58.5527 52.3178 62.0534C50.1097 64.2578 47.7745 66.3307 45.3253 68.2602" strokeWidth="3" strokeLinecap="round" strokeLinejoin="round"/>
        <path d="M37.9395 73.6026C36.3012 74.825 34.6351 76.0197 32.9898 77.1381" strokeWidth="3" strokeLinecap="round" strokeLinejoin="round"/>
      </svg>
    ),
  },
  {
    title: "Individuals account",
    content: "Easily integrate with all your need favorite tools through and APIsing including automatic",
    color: "#d9366d",
    icon: ({className, ...props}: TSVGElementProps) => (
      <svg className={className} {...props} viewBox="0 0 42 66">
        <path d="M2 6.77021L2 59.2317C2 61.8657 4.12665 64.001 6.75 64.001L35.25 64.001C37.8733 64.001 40 61.8657 40 59.2317L40 6.77021C40 4.13624 37.8734 2.00098 35.25 2.00098L6.75 2.00098C4.12665 2.00098 2.00001 4.13623 2 6.77021Z" strokeWidth="4" strokeLinecap="round" strokeLinejoin="round"/>
        <path d="M30 54.001L11 54.001" strokeWidth="4" strokeLinecap="round" strokeLinejoin="round"/>
      </svg>
    ),
  },
  {
    title: "Companies account",
    content: "Easily integrate with all your need favorite tools through and APIsing including automatic",
    color: "#625FF9",
    icon: ({className, ...props}: TSVGElementProps) => (
      <svg className={className} {...props} viewBox="0 0 83 59">
        <path d="M77.9935 2.21313L5.01724 2.21313C3.33792 2.21313 1.97656 3.57449 1.97656 5.25381L1.97656 53.9047C1.97656 55.584 3.33792 56.9453 5.01724 56.9453L77.9935 56.9453C79.6728 56.9453 81.0342 55.584 81.0342 53.9047L81.0342 5.25381C81.0342 3.57449 79.6728 2.21313 77.9935 2.21313Z" strokeWidth="3" strokeLinecap="round" strokeLinejoin="round"/>
        <path d="M56.709 44.7825L68.8717 44.7825" strokeWidth="3" strokeLinecap="round" strokeLinejoin="round"/>
        <path d="M38.4648 44.7825L44.5462 44.7825" strokeWidth="3" strokeLinecap="round" strokeLinejoin="round"/>
        <path d="M1.97656 17.759L81.0342 17.759" strokeWidth="3" strokeLinecap="round" strokeLinejoin="round"/>
      </svg>
    ),
  },
  {
    title: "Quick to share",
    content: "Easily integrate with all your need favorite tools through and APIsing including automatic",
    color: "#F54BC3",
    icon: ({className, ...props}: TSVGElementProps) => (
      <svg className={className} {...props} viewBox="0 0 82 82">
        <path d="M69.1875 46.979V60.6457C69.1875 65.3624 65.3625 69.1874 60.6458 69.1874H21.3542C16.6375 69.1874 12.8125 65.3624 12.8125 60.6457V21.354C12.8125 16.6373 16.6375 12.8124 21.3542 12.8124H35.0208" strokeWidth="6.25" strokeMiterlimit="10" strokeLinecap="round"/>
        <path d="M29.5693 41.3022C34.9625 29.5301 46.8491 21.354 60.6456 21.354H69.1873" strokeWidth="6.25" strokeMiterlimit="10" strokeLinecap="round" strokeLinejoin="round"/>
        <path d="M26.479 55.5207C26.479 53.756 26.6123 52.0238 26.8702 50.3308" strokeWidth="6.25" strokeMiterlimit="10" strokeLinecap="round" strokeLinejoin="round"/>
        <path d="M60.646 29.8957L69.1877 21.354L60.646 12.8124" strokeWidth="6.25" strokeMiterlimit="10" strokeLinecap="round" strokeLinejoin="round"/>
      </svg>
    ),
  },
];

export default function Home({}: PropsWithChildren) {
  const props = usePage().props
  const locale = props.locale;
  const { reviews } = useReviews(locale as string);

  const __ = (key: string) => key;




  return (
    <LandingLayout>
      <Head title="Welcome" />

      <HomeSection className="py-20 justify-center bg-white">
        <div className="grid grid-cols-1 md:grid-cols-2">
          <div className="px-6 py-10 relative flex flex-col items-start justify-center">
            <h1 className="text-center md:text-start font-bold leading-[3rem] text-[2.5rem]">
              <span className="text-[#2273AF]">{__('Ready To Launch Your Online Digital')} </span>
              <span className="text-[#45C8F0]">{__('Business Card')} </span>
              <span className="text-[#2273AF]">{__('App')}</span>
            </h1>
            <p className="mt-6 text-center md:text-start text-lg font-semibold leading-8 text-[#6B7280]">{__('Tekcard is a free digital business card and contact manager app designed to help you grow your network.')}</p>
            <div className="mt-10 mx-auto md:mx-0 grid grid-cols-2 gap-6">
              <a href="#" className="h-12 md:h-16">
                <img className="h-full w-full object-contain" src={AppstoreImage} alt="playstore" />
              </a>
              <a href="#" className="h-12 md:h-16">
                <img className="h-full w-full object-contain" src={PlaystoreImage} alt="appstore" />
              </a>
            </div>
          </div>
          <div className="px-6 py-10 mx-auto max-w-xl">
            <div className="relative h-full flex justify-center">
              <img className="w-full object-contain" src={HeroImage} alt="hero"/>
            </div>
          </div>
        </div>
      </HomeSection>

      <div className={'py-20 max-w-7xl mx-auto justify-center bg-gray-50'}>
        <div className="px-20 py-36 rounded-2xl shadow-md bg-gradient-to-r from-[#E1ECFA] from-10% to-[#F5F5F5] to-90%">
          <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-10">
            {data && data.map((item, index) => (
              <div key={index} className={'flex flex-col items-center justify-center gap-6'}>
                <div className={'flex-shrink-0 h-20 w-20 rounded-full bg-sky-100 flex items-center justify-center'}>
                  {item.icon()}
                </div>
                <div className="flex-grow">
                  <p className={'text-center text-2xl text-[#2273AF] font-bold'}>{item.title}</p>
                </div>
              </div>
            ))}
          </div>
        </div>
      </div>

      <HomeSection className={'py-20 justify-center bg-white'}>
        <div className="min-h-full h-full p-4 grid grid-cols-1 lg:grid-cols-2 gap-10">
          <div className={'flex flex-col justify-center space-y-8'}>
            <h3 className={'text-[#2273AF] text-[3rem] font-extrabold'}>Network smarter with free digital business cards.</h3>
            <p className={'text-[#4E4E4E] text-[1.25rem] font-normal'}>Stand out from the crowd with digital business cards. Not only are digital cards better for the environment, they’re also better for your wallet and will help you make a great first impression.</p>
            <a href="#" className={'block text-[#44C8EF] text-[1.25rem] font-normal'}>
              Learn more about our digital business cards →
            </a>
          </div>
          <div className={'hidden lg:block relative m-12 h-[50vh] bg-gradient-to-r from-sky-200 to-sky-100 rounded-2xl'}>
            <div className={'absolute inset-0 top-1/4 flex justify-center gap-12'}>
              <img className={'h-[60vh] object-contain'} src={ImageIphone16} alt=""/>
              <img className={'h-[60vh] object-contain'} src={ImageIphone14} alt=""/>
            </div>
          </div>
          <div className={'col-span-full'}>
            <div className="bg-white rounded-2xl shadow border">
              <div className="max-w-xl flex items-center flex-wrap divide-x">
                <div className="px-10 py-4">
                  <div className="text-blue-500 text-3xl font-bold font-['Tajawal'] leading-10">12.000 +</div>
                  <div className="text-neutral-600 text-xl font-normal font-['Tajawal'] capitalize leading-loose">Downloaded</div>
                </div>
                <div className="px-10 py-4">
                  <div className="text-blue-500 text-3xl font-bold font-['Tajawal'] leading-10">$10 M</div>
                  <div className="text-neutral-600 text-xl font-normal font-['Tajawal'] capitalize leading-loose">Transactions</div>
                </div>
                <div className="px-10 py-4">
                  <div className="text-blue-500 text-3xl font-bold font-['Tajawal'] leading-10">1.000 +</div>
                  <div className="text-neutral-600 text-xl font-normal font-['Tajawal'] capitalize leading-loose">Feedback</div>
                </div>
              </div>
            </div>
          </div>
          <div className={'lg:hidden block relative p-12 bg-gradient-to-r from-sky-200 to-sky-100 rounded-2xl'}>
            <div className={'flex flex-col sm:flex-row justify-center gap-12'}>
              <img className={'h-[60vh] object-contain'} src={ImageIphone16} alt=""/>
              <img className={'h-[60vh] object-contain'} src={ImageIphone14} alt=""/>
            </div>
          </div>
        </div>
      </HomeSection>

      <HomeSection className={'py-20 justify-center bg-gray-50'}>
        <div className="space-y-10">
          <div className="mx-auto max-w-xl text-center">
            <span className="inline text-[#2273AF] text-5xl font-bold">Easily share and receive </span>
            <span className="inline text-[#45C8F0] text-5xl font-bold">information</span>
            <span className="inline text-[#2273AF] text-5xl font-bold"> now.</span>
          </div>

          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-12">
            {grids && grids.map(({title, content, color, icon: Icon}, index) => (
              <div key={index} className="p-8 flex-col justify-start items-start gap-y-8 flex bg-white rounded-2xl shadow overflow-hidden">
                <div className={`px-6 py-8 w-full relative rounded-2xl overflow-hidden`}
                  style={{
                    background: color ?? '#cccccc',
                  }}
                >
                  <Icon className={"h-16 text-transparent"}
                        fill="currentColor"
                        stroke={'white'}/>
                  <Icon className={"z-10 absolute -top-1/4 -end-10 h-44 -rotate-[36deg] text-gray-50/50"}
                        style={{stroke: 'currentColor', fill: 'none'}}/>
                </div>
                <div className="text-blue-500 text-[35px] font-medium font-['Tajawal'] leading-9">
                  {title}
                </div>
                <div className="text-neutral-600 text-xl font-normal font-['Tajawal'] leading-loose">
                  {content}
                </div>
              </div>
            ))}
          </div>

        </div>
      </HomeSection>

      <HomeSection className={'py-20 justify-center bg-white'}>
        <div className={'px-20 py-20 grid grid-cols-1 lg:grid-cols-2 gap-10 bg-sky-200 rounded-lg'}>
          <div className={'flex flex-col justify-center space-y-8'}>
            <h2 className={'uppercase text-center font-bold tracking-wide leading-[3rem] text-4xl text-sky-400'}>
              {`Create your digital business card today.`}
            </h2>
            <button type='button' className={"block px-10 py-6 text-white bg-sky-600 rounded-lg shadow"}>
              {'Get Started'}
            </button>
          </div>
          <div className={''}>
            <img src={Background} alt="bg-phone"/>
          </div>
        </div>
      </HomeSection>

      <HomeSection>
        <FaqsSection />
      </HomeSection>

      <div className="mt-20"></div>

    </LandingLayout>
  );
}

const HomeSection = ({children, className}: PropsWithChildren & {className?: string}) => {
  return (
    <div className={`min-h-screen h-full flex flex-col ${className}`}>
      <div className={'mx-auto max-w-7xl w-full min-h-full'}>
        {children}
      </div>
    </div>
  );
}

const HeroSection = () => {
  const __ = (key: string) => key;

  return (
    <section className={'min-h-full h-full p-4 grid grid-cols-4 grid-rows-1 gap-x-6 items-center'}>
      <div className="relative col-span-full lg:col-span-2 flex flex-col items-start justify-center">
        <h1 className="mt-6 font-extrabold leading-[2] text-[2.4375rem] text-sky-600">
          <span>{__('Ready To Launch Your OnlineDigital')} </span>
          <span className="text-sky-400">{'Business Card'} </span>
          <span>{__('App')}</span>
        </h1>
        <p className="mt-6 text-base leading-8 text-gray-800">{__('Tekcard is a free digital business card and contact manager app designed to help you grow your network.')}</p>
        <div className="mt-10 grid grid-cols-2 gap-6">
          <a href="#" className="h-16">
            <img className="h-full w-full object-contain" src={AppstoreImage} alt="playstore" />
          </a>
          <a href="#" className="h-16">
            <img className="h-full w-full object-contain" src={PlaystoreImage} alt="appstore" />
          </a>
        </div>
      </div>
      <div className="col-span-full lg:col-span-2 hidden md:block">
        <div className="relative h-full flex justify-center">
          <img src={HeroImage} alt="hero"/>
        </div>
      </div>
    </section>
  );
}

const data = [
  {
    icon: () => (<svg width="101" height="100" viewBox="0 0 101 100" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M67.9269 37.3H92.179C95.5269 37.3 98.2415 40.0146 98.2415 43.3625V85.8042C98.2415 89.1521 95.5269 91.8667 92.179 91.8667H25.4873C22.1394 91.8667 19.4248 89.1521 19.4248 85.8042V43.3625C19.4248 40.0146 22.1394 37.3 25.4873 37.3H49.7394H67.9269Z" fill="#2273AF" fillOpacity="0.1"/>
      <path d="M23.9938 84.375H16.125C12.6729 84.375 9.875 81.5771 9.875 78.125V34.375C9.875 30.9229 12.6729 28.125 16.125 28.125H41.125" stroke="#2273AF" strokeWidth="6.25" strokeMiterlimit="10" strokeLinecap="round" strokeLinejoin="round"/>
      <path d="M74.525 28.125H84.875C88.3271 28.125 91.125 30.9229 91.125 34.375V78.125C91.125 81.5771 88.3271 84.375 84.875 84.375H35.5625" stroke="#2273AF" strokeWidth="6.25" strokeMiterlimit="10" strokeLinecap="round" strokeLinejoin="round"/>
      <path d="M55.7085 51.0417H76.5418" stroke="#2273AF" strokeWidth="6.25" strokeMiterlimit="10" strokeLinecap="round"/>
      <path d="M55.7085 65.625H76.5418" stroke="#2273AF" strokeWidth="6.25" strokeMiterlimit="10" strokeLinecap="round"/>
      <path d="M50.5 11.4583C45.3229 11.4583 41.125 15.6562 41.125 20.8333V30.2083C41.125 32.5103 42.9896 34.3749 45.2917 34.3749H55.7083C58.0104 34.3749 59.875 32.5103 59.875 30.2083V20.8333C59.875 15.6562 55.6771 11.4583 50.5 11.4583Z" stroke="#2273AF" strokeWidth="6.25" strokeMiterlimit="10"/>
      <path d="M32.8687 56.7999C36.7957 56.7999 39.9791 53.6165 39.9791 49.6895C39.9791 45.7625 36.7957 42.5791 32.8687 42.5791C28.9417 42.5791 25.7583 45.7625 25.7583 49.6895C25.7583 53.6165 28.9417 56.7999 32.8687 56.7999Z" stroke="#2273AF" strokeWidth="6.25" strokeMiterlimit="5"/>
      <path d="M33.4331 72.6938C27.1852 72.8542 20.7373 70.3479 20.7373 65.1709C20.7373 62.1729 23.1686 59.7417 26.1665 59.7417H39.5706C42.5686 59.7417 44.9998 62.1729 44.9998 65.1709C44.9998 66.8021 44.3581 68.1688 43.2852 69.2709" stroke="#2273AF" strokeWidth="6.25" strokeMiterlimit="10" strokeLinecap="round"/>
    </svg>),
    title: 'Easily create digital business cards',
  },
  {
    icon: () => (<svg width="101" height="100" viewBox="0 0 101 100" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M81.5835 91.6667H35.7502C29.9981 91.6667 25.3335 87.0021 25.3335 81.25V35.4167C25.3335 29.6646 29.9981 25 35.7502 25H81.5835C87.3356 25 92.0002 29.6646 92.0002 35.4167V81.25C92.0002 87.0021 87.3356 91.6667 81.5835 91.6667Z" fill="#2273AF" fillOpacity="0.1"/>
      <path d="M84.7085 57.2917V73.9583C84.7085 79.7104 80.0439 84.375 74.2918 84.375H26.3752C20.6231 84.375 15.9585 79.7104 15.9585 73.9583V26.0417C15.9585 20.2896 20.6231 15.625 26.3752 15.625H43.0418" stroke="#2273AF" strokeWidth="6.25" strokeMiterlimit="10" strokeLinecap="round"/>
      <path d="M36.394 50.3688C42.9711 36.0126 57.467 26.0417 74.292 26.0417H84.7086" stroke="#2273AF" strokeWidth="6.25" strokeMiterlimit="10" strokeLinecap="round" strokeLinejoin="round"/>
      <path d="M32.625 67.7083C32.625 65.5562 32.7875 63.4437 33.1021 61.3792" stroke="#2273AF" strokeWidth="6.25" strokeMiterlimit="10" strokeLinecap="round" strokeLinejoin="round"/>
      <path d="M74.292 36.4583L84.7087 26.0417L74.292 15.625" stroke="#2273AF" strokeWidth="6.25" strokeMiterlimit="10" strokeLinecap="round" strokeLinejoin="round"/>
    </svg>),
    title: 'Share your cards with anyone',
  },
  {
    icon: () => (<svg width="116" height="109" viewBox="0 0 116 109" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clipPath="url(#clip0_511_15217)">
          <path d="M102.582 104H29.5044C22.3448 104 16.6665 98.3321 16.6665 91.1857V47.8143C16.6665 40.9143 22.3448 35 29.5044 35H102.829C109.741 35 115.667 40.6679 115.667 47.8143V91.4321C115.42 98.3321 109.741 104 102.582 104Z" fill="#2273AF" fillOpacity="0.1"/>
          <path d="M13.6666 14C9.25453 14 5.6665 17.6735 5.6665 22.1906V79.5244C5.6665 84.0415 9.25453 87.715 13.6666 87.715H52.7841C50.7961 85.4544 49.6669 82.5877 49.6669 79.5244H29.6667V75.4291H21.6666V79.5244H13.6666V22.1906H47.1981L51.1981 30.3811H85.6672V54.0489C85.8232 54.1923 86.0035 54.3012 86.1516 54.4568L86.6359 54.9528H89.6672H93.6672V30.3811C93.6672 25.864 90.0792 22.1906 85.6672 22.1906H56.1357L54.3544 18.5272C52.9944 15.7342 50.2541 14 47.1981 14H13.6666ZM37.6668 34.4764C35.545 34.4764 33.5102 35.3393 32.0099 36.8753C30.5096 38.4114 29.6667 40.4947 29.6667 42.6669C29.6667 44.8392 30.5096 46.9225 32.0099 48.4585C33.5102 49.9945 35.545 50.8575 37.6668 50.8575C39.7885 50.8575 41.8234 49.9945 43.3237 48.4585C44.824 46.9225 45.6668 44.8392 45.6668 42.6669C45.6668 40.4947 44.824 38.4114 43.3237 36.8753C41.8234 35.3393 39.7885 34.4764 37.6668 34.4764ZM61.667 42.6669V50.8575H77.6671V42.6669H61.667ZM37.6668 54.9528C28.9267 54.9528 21.6666 58.6745 21.6666 64.0312V67.2386H53.6669V64.0312C53.6669 58.6745 46.4068 54.9528 37.6668 54.9528ZM77.6046 59.048C76.5655 59.065 75.5736 59.4953 74.839 60.2478L72.0108 63.1433H65.667C64.6062 63.1434 63.5888 63.5749 62.8387 64.3429C62.0885 65.1109 61.6671 66.1525 61.667 67.2386V73.7334L58.8388 76.6289C58.089 77.397 57.6677 78.4385 57.6677 79.5244C57.6677 80.6104 58.089 81.6519 58.8388 82.4199L61.667 85.3154V91.8102C61.6671 92.8963 62.0885 93.9379 62.8387 94.7059C63.5888 95.4739 64.6062 95.9054 65.667 95.9055H72.0108L74.839 98.801C75.5891 99.5687 76.6064 100 77.6671 100C78.7278 100 79.7451 99.5687 80.4953 98.801L83.3234 95.9055H89.6672C90.7281 95.9054 91.7454 95.4739 92.4955 94.7059C93.2457 93.9379 93.6671 92.8963 93.6672 91.8102V85.3154L96.4954 82.4199C97.2453 81.6519 97.6665 80.6104 97.6665 79.5244C97.6665 78.4385 97.2453 77.397 96.4954 76.6289L93.6672 73.7334V67.2386C93.6671 66.1525 93.2457 65.1109 92.4955 64.3429C91.7454 63.5749 90.7281 63.1434 89.6672 63.1433H83.3234L80.4953 60.2478C80.1165 59.8598 79.6654 59.5537 79.1688 59.3476C78.6723 59.1415 78.1404 59.0396 77.6046 59.048ZM77.6671 68.9343L78.839 70.1341C79.589 70.9021 80.6063 71.3337 81.6671 71.3339H85.6672V75.4291C85.6674 76.5152 86.0889 77.5567 86.8391 78.3246L88.0109 79.5244L86.8391 80.7242C86.0889 81.4921 85.6674 82.5336 85.6672 83.6197V87.715H81.6671C80.6063 87.7152 79.589 88.1467 78.839 88.9148L77.6671 90.1145L76.4952 88.9148C75.7452 88.1467 74.7279 87.7152 73.6671 87.715H69.667V83.6197C69.6668 82.5336 69.2453 81.4921 68.4952 80.7242L67.3233 79.5244L68.4952 78.3246C69.2453 77.5567 69.6668 76.5152 69.667 75.4291V71.3339H73.6671C74.7279 71.3337 75.7452 70.9021 76.4952 70.1341L77.6671 68.9343Z" fill="#2273AF"/>
        </g>
        <defs>
          <clipPath id="clip0_511_15217">
            <rect width="115" height="109" fill="white" transform="translate(0.666504)"/>
          </clipPath>
        </defs>
      </svg>),
    title: 'Manage your contacts seamlessly',
  },
  {
    icon: () => (<svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clipPath="url(#clip0_511_15224)">
          <path d="M89.1665 87.5001H27.4998C21.4582 87.5001 16.6665 82.7084 16.6665 76.6667V40.0001C16.6665 34.1667 21.4582 29.1667 27.4998 29.1667H89.3748C95.2082 29.1667 100.208 33.9584 100.208 40.0001V76.8751C99.9998 82.7084 95.2082 87.5001 89.1665 87.5001Z" fill="#2273AF" fillOpacity="0.1"/>
          <path d="M80.2083 21.875C86.0417 21.875 90.625 26.4583 90.625 32.2917V67.7083C90.625 73.5417 86.0417 78.125 80.2083 78.125H33.125" stroke="#2273AF" strokeWidth="6.25" strokeLinecap="round" strokeLinejoin="round"/>
          <path d="M19.7917 78.125C13.9583 78.125 9.375 73.5417 9.375 67.7083V32.2917C9.375 26.4583 13.9583 21.875 19.7917 21.875H59.375" stroke="#2273AF" strokeWidth="6.25" strokeLinecap="round" strokeLinejoin="round"/>
          <path d="M31.25 47.2917H22.9167C20.625 47.2917 18.75 45.4167 18.75 43.1251V39.5834C18.75 37.2917 20.625 35.4167 22.9167 35.4167H31.25C33.5417 35.4167 35.4167 37.2917 35.4167 39.5834V43.1251C35.4167 45.4167 33.5417 47.2917 31.25 47.2917Z" fill="#2273AF"/>
          <path d="M21.875 61.4583H28.125" stroke="#2273AF" strokeWidth="6.25" strokeLinecap="round" strokeLinejoin="round"/>
          <path d="M38.5415 61.4583H44.7915" stroke="#2273AF" strokeWidth="6.25" strokeLinecap="round" strokeLinejoin="round"/>
          <path d="M55.2085 61.4583H61.4585" stroke="#2273AF" strokeWidth="6.25" strokeLinecap="round" strokeLinejoin="round"/>
          <path d="M71.875 61.4583H78.125" stroke="#2273AF" strokeWidth="6.25" strokeLinecap="round" strokeLinejoin="round"/>
          <path d="M51.0415 38.5417H78.1248" stroke="#2273AF" strokeWidth="6.25" strokeLinecap="round" strokeLinejoin="round"/>
        </g>
        <defs>
          <clipPath id="clip0_511_15224">
            <rect width="100" height="100" fill="white"/>
          </clipPath>
        </defs>
      </svg>),
    title: 'Turn paper cards into digital contacts',
  }
]
const FeaturesSection = () => {
  return (
    <section className={'max-w-7xl mx-auto py-20 bg-white '}>
      <div className={''}>
        <div className={'px-12 py-10 flex flex-wrap ld:flex-nowrap items-center gap-10 rounded-lg'}>
          {data && data.map((item, index) => (
            <div key={index} className={'flex flex-col items-center gap-4'}>
              <div className={'h-20 w-20 rounded-full bg-sky-100 flex items-center justify-center'}>
                {item.icon()}
              </div>
              <p className={'text-center text-gray-800 font-bold'}>{item.title}</p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
const TestimonialsSection = () => {
  const locale = usePage().props.locale;
  const {reviews} = useReviews(locale as string);
  return (
    <section className={'max-w-5xl mx-auto py-20 px-24 border bg-sky-100'}>
      {reviews && <Testimonials reviews={reviews}/>}
    </section>
  );
}
const Testimonials: React.FC<PropsWithChildren & {reviews: ReviewType[]}> = ({reviews}) => {
  return (
    <ul className={'flex flex-col space-y-10'}>
      {reviews.map((review)=> (
        <Review review={review} key={review.id} />
        /*<Review1 />*/
      ))}
    </ul>
  )
}

const Review: React.FC<PropsWithChildren & {review: ReviewType}> = ({review}) => {
  return (
    <div className={'px-24 py-20 bg-white rounded-lg shadow'}>
      <div className={'flex flex-col divide-y'}>
        <div className={'mb-10 flex items-center gap-10'}>

          <div className={'flex-grow flex items-stretch gap-6'}>
            <div className={'h-12 w-12 rounded-full overflow-hidden'}>
              <img src={review.image} alt="rev-o" className={'w-full h-full object-cover '} />
            </div>

            <div>
              <p>{review.name}</p>
              <p>{review.position}</p>
            </div>
          </div>

          <div className={'flex-shrink-0'}>
            <svg width="241" height="50" viewBox="0 0 241 50">
              <path d="M22.5979 6.3541C23.1966 4.51148 25.8034 4.51148 26.4021 6.3541L29.5516 16.0471C29.8193 16.8712 30.5872 17.4291 31.4537 17.4291L41.6455 17.4291C43.583 17.4291 44.3885 19.9083 42.8211 21.0471L34.5757 27.0377C33.8747 27.547 33.5814 28.4498 33.8492 29.2738L36.9986 38.9668C37.5973 40.8094 35.4884 42.3417 33.9209 41.2029L25.6756 35.2123C24.9746 34.703 24.0254 34.703 23.3244 35.2123L15.0791 41.2029C13.5116 42.3417 11.4027 40.8094 12.0014 38.9668L15.1508 29.2738C15.4186 28.4498 15.1253 27.547 14.4243 27.0377L6.17891 21.0471C4.61148 19.9083 5.41704 17.4291 7.35448 17.4291L17.5463 17.4291C18.4128 17.4291 19.1807 16.8712 19.4484 16.0471L22.5979 6.3541Z" fill="#FFB545"/>
              <path d="M120.598 6.3541C121.197 4.51148 123.803 4.51148 124.402 6.3541L127.552 16.0471C127.819 16.8712 128.587 17.4291 129.454 17.4291L139.646 17.4291C141.583 17.4291 142.389 19.9083 140.821 21.0471L132.576 27.0377C131.875 27.547 131.581 28.4498 131.849 29.2738L134.999 38.9668C135.597 40.8094 133.488 42.3417 131.921 41.2029L123.676 35.2123C122.975 34.703 122.025 34.703 121.324 35.2123L113.079 41.2029C111.512 42.3417 109.403 40.8094 110.001 38.9668L113.151 29.2738C113.419 28.4498 113.125 27.547 112.424 27.0377L104.179 21.0471C102.611 19.9083 103.417 17.4291 105.354 17.4291L115.546 17.4291C116.413 17.4291 117.181 16.8712 117.448 16.0471L120.598 6.3541Z" fill="#FFB545"/>
              <path d="M71.5979 6.3541C72.1966 4.51148 74.8034 4.51148 75.4021 6.3541L78.5516 16.0471C78.8193 16.8712 79.5872 17.4291 80.4537 17.4291L90.6455 17.4291C92.583 17.4291 93.3885 19.9083 91.8211 21.0471L83.5757 27.0377C82.8747 27.547 82.5814 28.4498 82.8492 29.2738L85.9986 38.9668C86.5973 40.8094 84.4884 42.3417 82.9209 41.2029L74.6756 35.2123C73.9746 34.703 73.0254 34.703 72.3244 35.2123L64.0791 41.2029C62.5116 42.3417 60.4027 40.8094 61.0014 38.9668L64.1508 29.2738C64.4186 28.4498 64.1253 27.547 63.4243 27.0377L55.1789 21.0471C53.6115 19.9083 54.417 17.4291 56.3545 17.4291L66.5463 17.4291C67.4128 17.4291 68.1807 16.8712 68.4484 16.0471L71.5979 6.3541Z" fill="#FFB545"/>
              <path d="M169.598 6.3541C170.197 4.51148 172.803 4.51148 173.402 6.3541L176.552 16.0471C176.819 16.8712 177.587 17.4291 178.454 17.4291L188.646 17.4291C190.583 17.4291 191.389 19.9083 189.821 21.0471L181.576 27.0377C180.875 27.547 180.581 28.4498 180.849 29.2738L183.999 38.9668C184.597 40.8094 182.488 42.3417 180.921 41.2029L172.676 35.2123C171.975 34.703 171.025 34.703 170.324 35.2123L162.079 41.2029C160.512 42.3417 158.403 40.8094 159.001 38.9668L162.151 29.2738C162.419 28.4498 162.125 27.547 161.424 27.0377L153.179 21.0471C151.611 19.9083 152.417 17.4291 154.354 17.4291L164.546 17.4291C165.413 17.4291 166.181 16.8712 166.448 16.0471L169.598 6.3541Z" fill="#FFB545"/>
              <path d="M214.598 6.3541C215.197 4.51148 217.803 4.51148 218.402 6.3541L221.552 16.0471C221.819 16.8712 222.587 17.4291 223.454 17.4291L233.646 17.4291C235.583 17.4291 236.389 19.9083 234.821 21.0471L226.576 27.0377C225.875 27.547 225.581 28.4498 225.849 29.2738L228.999 38.9668C229.597 40.8094 227.488 42.3417 225.921 41.2029L217.676 35.2123C216.975 34.703 216.025 34.703 215.324 35.2123L207.079 41.2029C205.512 42.3417 203.403 40.8094 204.001 38.9668L207.151 29.2738C207.419 28.4498 207.125 27.547 206.424 27.0377L198.179 21.0471C196.611 19.9083 197.417 17.4291 199.354 17.4291L209.546 17.4291C210.413 17.4291 211.181 16.8712 211.448 16.0471L214.598 6.3541Z" fill="#FFB545"/>
            </svg>
          </div>

        </div>

        <div>
          <p className={'mt-10'}>{review.content}</p>
        </div>
      </div>
    </div>
  );
}

import { StarIcon } from '@heroicons/react/20/solid'

export function Review1() {
  return (
    <section className="bg-white px-6 py-24 sm:py-32 lg:px-8">
      <figure className="mx-auto max-w-2xl">
        <p className="sr-only">5 out of 5 stars</p>
        <div className="flex gap-x-1 text-indigo-600">
          <StarIcon className="h-5 w-5 flex-none" aria-hidden="true" />
          <StarIcon className="h-5 w-5 flex-none" aria-hidden="true" />
          <StarIcon className="h-5 w-5 flex-none" aria-hidden="true" />
          <StarIcon className="h-5 w-5 flex-none" aria-hidden="true" />
          <StarIcon className="h-5 w-5 flex-none" aria-hidden="true" />
        </div>
        <blockquote className="mt-10 text-xl font-semibold leading-8 tracking-tight text-gray-900 sm:text-2xl sm:leading-9">
          <p>
            “Qui dolor enim consectetur do et non ex amet culpa sint in ea non dolore. Enim minim magna anim id minim eu
            cillum sunt dolore aliquip. Amet elit laborum culpa irure incididunt adipisicing culpa amet officia
            exercitation. Eu non aute velit id velit Lorem elit anim pariatur.”
          </p>
        </blockquote>
        <figcaption className="mt-10 flex items-center gap-x-6">
          <img
            className="h-12 w-12 rounded-full bg-gray-50"
            src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=1024&h=1024&q=80"
            alt=""
          />
          <div className="text-sm leading-6">
            <div className="font-semibold text-gray-900">Judith Black</div>
            <div className="mt-0.5 text-gray-600">CEO of Workcation</div>
          </div>
        </figcaption>
      </figure>
    </section>
  )
}

const CallToActionSection = () => {
  return (
    <section className={'max-w-7xl mx-auto py-20'}>
      <div className={'px-20 py-20 grid grid-cols-1 lg:grid-cols-2 gap-10 bg-sky-200 rounded-lg'}>
        <div className={'flex flex-col justify-center space-y-8'}>
          <h2 className={'uppercase text-center font-bold tracking-wide leading-[3rem] text-4xl text-sky-400'}>
            {`Create your digital business card today.`}
          </h2>
          <button type='button' className={"block px-10 py-6 text-white bg-sky-600 rounded-lg shadow"}>
            {'Get Started'}
          </button>
        </div>
        <div className={''}>
          <img src={Background} alt="bg-phone"/>
        </div>
      </div>
    </section>
  );
}

const FaqsSection = () => {
  const locale = usePage().props.locale;
  const {faqs} = useFaqs(locale as string);
  return (
    <section className={'max-w-2xl mx-auto py-20'}>
      <div className={'max-w-md mx-auto flex justify-center'}>
        <h2 className={'text-center font-bold tracking-wide leading-[4.5rem] text-5xl text-sky-400'}>
          {`Frequently Ask Questions (${locale})`}
        </h2>
      </div>
      <div className={'mt-12'}>
        {faqs && <Faqs Faqs={faqs}></Faqs>}
      </div>
    </section>
  );
}

const Faqs: React.FC<PropsWithChildren & {Faqs: FaqType[]}> = ({Faqs}) => {
  return (
    <div className={'flex flex-col space-y-10'}>
      {Faqs.map((faq)=> (
        <Faq Faq={faq} key={faq.number} />
      ))}
    </div>
  )
}

const PartnersSection = () => {
  return (
    <section className={'max-w-7xl mx-auto py-20'}>
      <div className={'max-w-md mx-auto flex justify-center'}>
        <h2 className={'text-center font-bold tracking-wide leading-[4.5rem] text-5xl text-sky-400'}>
          {`Our Partners`}
        </h2>
      </div>
      <div className={'mt-12'}>
        <div className={'px-12 py-10 bg-white flex items-center gap-10 rounded-lg '}>
          <DummySponsorIcon size={12} />
          <DummySponsorIcon size={12} />
          <DummySponsorIcon size={12} />
          <DummySponsorIcon size={12} />
          <DummySponsorIcon size={12} />
        </div>
      </div>
    </section>
  );
}

