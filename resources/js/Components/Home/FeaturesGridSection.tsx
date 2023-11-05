import React, {SVGProps} from "react";

type TSVGElementProps = SVGProps<SVGSVGElement>

const grids = [
  {
    title: "Safe & Security",
    content: "Easily integrate with all your need favorite tools through and API sing including automatic",
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
    content: "Easily integrate with all your need favorite tools through and API sing including automatic",
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
    content: "Easily integrate with all your need favorite tools through and API sing including automatic",
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
    content: "Easily integrate with all your need favorite tools through and API sing including automatic",
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
    content: "Easily integrate with all your need favorite tools through and API sing including automatic",
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
    content: "Easily integrate with all your need favorite tools through and API sing including automatic",
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

const FeaturesGridSection: React.FC = () => {
  return (
    <div className="space-y-10">

      <div className="mx-auto max-w-xl text-center">
        <span className="inline text-[#2273AF] text-5xl font-bold">Easily share and receive </span>
        <span className="inline text-[#45C8F0] text-5xl font-bold">information</span>
        <span className="inline text-[#2273AF] text-5xl font-bold"> now.</span>
      </div>

      <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-12">
        {grids && grids.map(({title, content, color, icon: Icon}, index) => (
          <div key={index} className="p-8 flex-col justify-start items-start gap-y-8 flex bg-white rounded-2xl shadow overflow-hidden">
            <div className={`px-6 py-8 w-full relative rounded-2xl overflow-hidden`} style={{background: color ?? '#cccccc',}}>
              <Icon className={"h-16 text-transparent"} fill="currentColor" stroke={'white'}/>
              <Icon className={"z-10 absolute -top-1/4 -end-10 h-44 -rotate-[36deg] text-gray-50/50"} style={{stroke: 'currentColor', fill: 'none'}}/>
            </div>
            <div className="text-blue-500 text-[35px] font-medium font-['Tajawal'] leading-9">{title}</div>
            <div className="text-neutral-600 text-xl font-normal font-['Tajawal'] leading-loose">{content}</div>
          </div>
        ))}
      </div>

    </div>
  );
}

export default FeaturesGridSection;
